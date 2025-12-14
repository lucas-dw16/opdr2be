DELIMITER $$

DROP PROCEDURE IF EXISTS sp_GetAllergeenProInfo;
$$
CREATE PROCEDURE sp_GetAllergeenProInfo(IN p_ProductId INT)
BEGIN
    SELECT 
        pr.Naam AS ProductNaam,
        pr.Barcode
    FROM Product pr
    WHERE pr.Id = p_ProductId;
END;
$$

DELIMITER ;
