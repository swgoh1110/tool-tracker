CREATE TABLE IF NOT EXISTS `*PREFIX*tooltracker_tools` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `status` ENUM('available', 'borrowed') NOT NULL DEFAULT 'available',
    `borrowed_by` VARCHAR(255) NULL,
    `qr_code` TEXT NOT NULL
);
