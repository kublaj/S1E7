CREATE TABLE posts (
  id BIGINT PRIMARY KEY AUTO_INCREMENT COMMENT 'Technical ID',
  created DATETIME NOT NULL,
  slug VARCHAR(255) COLLATE latin1_bin NOT NULL COMMENT 'URL part for post',
  title VARCHAR(255) NOT NULL,
  excerpt MEDIUMTEXT NOT NULL,
  content MEDIUMTEXT NOT NULL,

  UNIQUE u_slug(slug)
) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT 'Stores blog posts';
