DROP PROCEDURE IF EXISTS sp_GetProductsByLeverancier;

DELIMITER $$

CREATE PROCEDURE sp_GetProductsByLeverancier(
    IN p_LeverancierId INT
)
BEGIN
    SELECT 
        PROD.Id AS ProductId,
        PROD.Naam,
        DATE_FORMAT(MAX(PPLE.DatumLevering), '%d-%m-%Y') AS DatumLevering,
        MAGA.AantalAanwezig AS Aantal,
        MAGA.VerpakkingsEenheid,
        DATE_FORMAT(MAX(PPLE.DatumEerstVolgendeLevering), '%d-%m-%Y') AS DatumEerstVolgendeLevering,
        PROD.IsActief
    FROM Product AS PROD
    INNER JOIN ProductPerLeverancier AS PPLE
        ON PPLE.ProductId = PROD.Id
    INNER JOIN Magazijn AS MAGA
        ON MAGA.ProductId = PROD.Id
    WHERE PPLE.LeverancierId = p_LeverancierId
    GROUP BY PROD.Id, PROD.Naam, MAGA.AantalAanwezig, MAGA.VerpakkingsEenheid, PROD.IsActief
    ORDER BY MAGA.AantalAanwezig DESC;
END$$

DELIMITER ;
