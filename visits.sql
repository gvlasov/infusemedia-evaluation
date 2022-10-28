DROP TABLE IF EXISTS visits;
CREATE TABLE visits(
    ip_address VARCHAR(31) NOT NULL,
    user_agent VARCHAR(256) NOT NULL,
    view_date DATETIME NOT NULL,
    page_url VARCHAR(480) NOT NULL,
    views_count INT UNSIGNED NOT NULL,
    primary key (ip_address, user_agent, page_url)
) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci;