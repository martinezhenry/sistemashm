CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CONSULT`(IN TABLA VARCHAR(250), IN CAMPOS VARCHAR(250), OUT NOERROR INT)
BEGIN

	declare exit handler for 1146
    begin
        
        SET NOERROR = 1146;
        
        
    end;

  -- creamos una variable y concatenamos los textos, la variable
  -- pListaIds recibe varios ID concatenados de una vez
      
  SET @Query = CONCAT('SELECT * FROM ',TABLA);
  -- preparamos el objete Statement a partir de nuestra variable
  PREPARE smpt FROM @Query;
  -- ejecutamos el Statement
  EXECUTE smpt;
  
  -- liberamos la memoria
  DEALLOCATE PREPARE smpt;
  
END