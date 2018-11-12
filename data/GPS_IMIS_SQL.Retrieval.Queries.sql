-- Retrieving specific Inmate Record
SELECT * FROM Inmates WHERE Regulation_Number = 10;

-- Retrieving Inmates by Gender
SELECT * FROM Inmates WHERE Sex = 'M';

-- Searching Inmates with Name beginning With K
SELECT * FROM Inmates WHERE FirstName LIKE 'K%';
