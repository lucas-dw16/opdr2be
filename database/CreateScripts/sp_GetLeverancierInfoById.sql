DROP PROCEDURE IF EXISTS sp_GetLeverancierInfoById;

DELIMITER $$

CREATE PROCEDURE sp_GetLeverancierInfoById(
    IN p_LeverancierId INT
)
BEGIN
    SELECT 
        l.Id,
        l.Naam,
        l.Contactpersoon,
        l.Leveranciernummer,
        l.Mobiel
    FROM Leverancier AS l
    WHERE l.Id = p_LeverancierId;
END$$

DELIMITER ;
