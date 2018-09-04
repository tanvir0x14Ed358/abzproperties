<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180901144339 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE home_images ADD property_id INT NOT NULL');
        $this->addSql('ALTER TABLE home_images ADD CONSTRAINT FK_101BD7D7549213EC FOREIGN KEY (property_id) REFERENCES property_details (id)');
        $this->addSql('CREATE INDEX IDX_101BD7D7549213EC ON home_images (property_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE home_images DROP FOREIGN KEY FK_101BD7D7549213EC');
        $this->addSql('DROP INDEX IDX_101BD7D7549213EC ON home_images');
        $this->addSql('ALTER TABLE home_images DROP property_id');
    }
}
