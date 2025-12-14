DROP PROCEDURE IF EXISTS sp_GetLeverancierProductCount;
DELIMITER $$

CREATE PROCEDURE sp_GetLeverancierProductCount()
BEGIN
    SELECT
         l.Id
        ,l.Naam AS LeverancierNaam
        ,l.Contactpersoon
        ,l.Leveranciernummer
        ,l.Mobiel AS Telefoonnummer
        ,COUNT(DISTINCT ppl.ProductId) AS ProductCount
    FROM Leverancier l
    LEFT JOIN ProductPerLeverancier ppl
        ON l.Id = ppl.LeverancierId
    GROUP BY 
         l.Id
        ,l.Naam
        ,l.Contactpersoon
        ,l.Leveranciernummer
        ,l.Mobiel
    ORDER BY ProductCount DESC;  
END$$

DELIMITER ;
