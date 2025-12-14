DELIMITER $$

DROP PROCEDURE IF EXISTS sp_GetAllergeenInfo;
$$
CREATE PROCEDURE sp_GetAllergeenInfo(IN p_ProductId INT)
BEGIN
SELECT 
    a.Naam AS AllergeenNaam,
    a.Omschrijving AS AllergeenOmschrijving
FROM ProductPerAllergeen ppa
INNER JOIN Allergeen a ON ppa.AllergeenId = a.Id
WHERE ppa.ProductId = p_ProductId
ORDER BY a.Naam ASC;

END;
$$

DELIMITER ;
