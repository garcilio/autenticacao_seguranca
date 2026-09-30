CREATE USER IF NOT EXISTS 'user_db'@'localhost' IDENTIFIED BY 'segredo123';
GRANT ALL PRIVILEGES ON trabalho_db.* TO 'user_db'@'localhost';
FLUSH PRIVILEGES;