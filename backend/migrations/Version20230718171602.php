<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230718171602 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE association (id VARCHAR(36) NOT NULL, postal_code VARCHAR(15) NOT NULL, description VARCHAR(200) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE community (id VARCHAR(36) NOT NULL, address VARCHAR(100) NOT NULL, municipality VARCHAR(100) NOT NULL, community_type_id VARCHAR(36) NOT NULL, association_id VARCHAR(36) NOT NULL, UNIQUE INDEX UNIQ_1B604033D4E6F81 (address), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE community_type (id VARCHAR(36) NOT NULL, name VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_4D8FBDE35E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person (id VARCHAR(36) NOT NULL, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, document VARCHAR(15) NOT NULL, phone VARCHAR(100) NOT NULL, user_id VARCHAR(36) NOT NULL, UNIQUE INDEX UNIQ_34DCD176D8698A76 (document), UNIQUE INDEX UNIQ_34DCD176444F97DD (phone), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id VARCHAR(36) NOT NULL, email VARCHAR(70) NOT NULL, password VARCHAR(100) NOT NULL, createdAt DATETIME NOT NULL, updatedAt DATETIME NOT NULL, roles JSON NOT NULL, community_id VARCHAR(36) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE association');
        $this->addSql('DROP TABLE community');
        $this->addSql('DROP TABLE community_type');
        $this->addSql('DROP TABLE person');
        $this->addSql('DROP TABLE user');
    }
}
