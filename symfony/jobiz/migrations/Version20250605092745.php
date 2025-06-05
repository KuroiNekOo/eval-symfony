<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250605092745 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE job_category_job (job_category_id INT NOT NULL, job_id INT NOT NULL, INDEX IDX_D179D88D712A86AB (job_category_id), INDEX IDX_D179D88DBE04EA9 (job_id), PRIMARY KEY(job_category_id, job_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE job_category_job ADD CONSTRAINT FK_D179D88D712A86AB FOREIGN KEY (job_category_id) REFERENCES job_category (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE job_category_job ADD CONSTRAINT FK_D179D88DBE04EA9 FOREIGN KEY (job_id) REFERENCES job (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F8712A86AB
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_FBD8E0F8712A86AB ON job
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE job CHANGE company_id company_id INT DEFAULT NULL, CHANGE job_category_id job_type_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F85FA33B08 FOREIGN KEY (job_type_id) REFERENCES job_type (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_FBD8E0F85FA33B08 ON job (job_type_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE job_application DROP FOREIGN KEY FK_C737C688D32632E8
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_C737C688D32632E8 ON job_application
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE job_application CHANGE job_id job_id INT DEFAULT NULL, CHANGE _user_id user_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE job_application ADD CONSTRAINT FK_C737C688A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_C737C688A76ED395 ON job_application (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user CHANGE email email LONGTEXT NOT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE job_category_job DROP FOREIGN KEY FK_D179D88D712A86AB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE job_category_job DROP FOREIGN KEY FK_D179D88DBE04EA9
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE job_category_job
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE job_application DROP FOREIGN KEY FK_C737C688A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_C737C688A76ED395 ON job_application
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE job_application CHANGE job_id job_id INT NOT NULL, CHANGE user_id _user_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE job_application ADD CONSTRAINT FK_C737C688D32632E8 FOREIGN KEY (_user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_C737C688D32632E8 ON job_application (_user_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user CHANGE email email VARCHAR(255) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F85FA33B08
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_FBD8E0F85FA33B08 ON job
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE job CHANGE company_id company_id INT NOT NULL, CHANGE job_type_id job_category_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F8712A86AB FOREIGN KEY (job_category_id) REFERENCES job_category (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_FBD8E0F8712A86AB ON job (job_category_id)
        SQL);
    }
}
