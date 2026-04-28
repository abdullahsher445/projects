CREATE DATABASE IF NOT EXISTS handyman_premium CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE handyman_premium;

CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    short_description VARCHAR(255) NOT NULL,
    details TEXT NOT NULL,
    image_path VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    description TEXT NOT NULL,
    category VARCHAR(120) NOT NULL,
    image_path VARCHAR(255) DEFAULT NULL,
    before_image VARCHAR(255) DEFAULT NULL,
    after_image VARCHAR(255) DEFAULT NULL,
    completed_at DATE DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(120) NOT NULL,
    review_text TEXT NOT NULL,
    rating TINYINT NOT NULL DEFAULT 5,
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone VARCHAR(40) NOT NULL,
    service_type VARCHAR(120) NOT NULL,
    message TEXT NOT NULL,
    is_read TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(100) NOT NULL UNIQUE,
    setting_value TEXT DEFAULT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO admins (username, password_hash) VALUES
('admin', '$2y$12$Scey6VboOKQAFmbrMrgnkeFbYMEa7B37fQvU/4/iG4FPaJXm6JAGa');

INSERT INTO settings (setting_key, setting_value) VALUES
('business_name', 'Prestige Handyman Co.'),
('business_email', 'hello@prestigehandyman.com.au'),
('business_phone', '+61 400 000 000'),
('business_address', 'Sydney, NSW');

INSERT INTO services (title, short_description, details, image_path) VALUES
('General Repairs', 'Fixing doors, walls, fixtures, and common home issues.', 'From minor damage to wear-and-tear repairs, we restore your property quickly and safely.', '/assets/images/service-placeholder.svg'),
('Interior Painting', 'Professional paint finishes for modern interiors.', 'Premium prep, clean lines, and long-lasting paint systems tailored to each room.', '/assets/images/service-placeholder.svg'),
('Carpentry & Installations', 'Custom shelves, fittings, and furniture assembly.', 'We handle precision carpentry and secure installation work for homes and apartments.', '/assets/images/service-placeholder.svg');

INSERT INTO projects (title, description, category, image_path, completed_at) VALUES
('Kitchen Refresh', 'Cabinet repair, splashback updates, and final detailing.', 'Renovation', '/assets/images/project-placeholder.svg', '2026-03-20'),
('Outdoor Deck Restoration', 'Deck board replacements and protective coatings.', 'Outdoor', '/assets/images/project-placeholder.svg', '2026-04-02');

INSERT INTO reviews (customer_name, review_text, rating, is_active) VALUES
('Olivia M.', 'Professional team, great communication and excellent finish quality.', 5, 1),
('Daniel H.', 'Very reliable and punctual. The repairs were flawless.', 5, 1),
('Sophie W.', 'Premium service from first quote to final clean-up.', 4, 1);
