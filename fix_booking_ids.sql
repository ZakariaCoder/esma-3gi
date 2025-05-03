
-- First, let's examine the current table structure
SHOW CREATE TABLE booking_list;

-- Let's try a different approach - create a new table with the correct structure
CREATE TABLE booking_list_new (
  id INT AUTO_INCREMENT PRIMARY KEY,
  ref_code VARCHAR(100) NOT NULL,
  client_id INT NOT NULL,
  facility_id INT NOT NULL,
  date_from DATE NOT NULL,
  date_to DATE NOT NULL,
  status TINYINT(1) NOT NULL DEFAULT 0,
  date_created DATETIME DEFAULT CURRENT_TIMESTAMP,
  date_updated DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
);

-- Copy data from the original table to the new one, but let MySQL assign new IDs
INSERT INTO booking_list_new (ref_code, client_id, facility_id, date_from, date_to, status, date_created, date_updated)
SELECT ref_code, client_id, facility_id, date_from, date_to, status, date_created, date_updated FROM booking_list ORDER BY id;

-- Drop the original table
DROP TABLE booking_list;

-- Rename the new table to the original name
RENAME TABLE booking_list_new TO booking_list;

-- Display the updated booking_list to verify changes
SELECT * FROM booking_list ORDER BY id;
