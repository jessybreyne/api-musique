<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191210100457 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE album (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE album_artiste (album_id INTEGER NOT NULL, artiste_id INTEGER NOT NULL, PRIMARY KEY(album_id, artiste_id))');
        $this->addSql('CREATE TABLE artiste (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, photo CLOB DEFAULT NULL)');
        $this->addSql('CREATE TABLE artiste_musique (artiste_id INTEGER NOT NULL, musique_id INTEGER NOT NULL, PRIMARY KEY(artiste_id, musique_id))');
        $this->addSql('CREATE TABLE categorie (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE categorie_musique (categorie_id INTEGER NOT NULL, musique_id INTEGER NOT NULL, PRIMARY KEY(categorie_id, musique_id))');
        $this->addSql('CREATE TABLE musique (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, date DATETIME NOT NULL)');
        $this->addSql('CREATE TABLE playlist (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, owner_id INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE playlist_user (playlist_id INTEGER NOT NULL, user_id INTEGER NOT NULL, PRIMARY KEY(playlist_id, user_id))');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(50) NOT NULL, mdp VARCHAR(255) NOT NULL, apikey VARCHAR(255) DEFAULT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE album');
        $this->addSql('DROP TABLE album_artiste');
        $this->addSql('DROP TABLE artiste');
        $this->addSql('DROP TABLE artiste_musique');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE categorie_musique');
        $this->addSql('DROP TABLE musique');
        $this->addSql('DROP TABLE playlist');
        $this->addSql('DROP TABLE playlist_user');
        $this->addSql('DROP TABLE user');
    }
}
