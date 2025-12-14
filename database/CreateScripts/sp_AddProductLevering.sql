DROP PROCEDURE IF EXISTS sp_AddProductLevering;

DELIMITER $$

CREATE PROCEDURE sp_AddProductLevering(
    IN p_ProductId INT,
    IN p_AantalToevoegen INT,
    IN p_DatumLevering DATETIME
)
BEGIN
    DECLARE v_IsActief BIT;
    
    -- Check if product is active
    SELECT IsActief INTO v_IsActief
    FROM Product
    WHERE Id = p_ProductId;
    
    -- If product is not active, return error
    IF v_IsActief = 0 THEN
        SELECT 0 AS success, 'Het product wordt niet meer geproduceerd' AS message;
    ELSE
        -- Update magazine quantity
        UPDATE Magazijn
        SET AantalAanwezig = AantalAanwezig + p_AantalToevoegen
        WHERE ProductId = p_ProductId;
        
        -- Update the delivery date in ProductPerLeverancier
        UPDATE ProductPerLeverancier
        SET DatumLevering = NOW(),
            DatumEerstVolgendeLevering = p_DatumLevering
        WHERE ProductId = p_ProductId;
        
        SELECT 1 AS success, 'Levering succesvol toegevoegd' AS message;
    END IF;
END$$

DELIMITER ;
