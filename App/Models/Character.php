<?php

namespace App\Models;

use App\Core\Model;

class character extends Model
{
    protected ?string $character_name = null;
    protected ?string $character_class = null;
    protected ?string $character_description = null;
    protected ?string $character_image= null;
    protected ?string $author = null;
    protected ?int $id;

    public function getAuthor(): ?string
    {
        return $this->author;
    }
    public function setAuthor(?string $author): void
    {
        $this->author = $author;
    }
    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(?int $id): void
    {
        $this->id = $id;
    }
    public function getCharacterDescription(): ?string
    {
        return $this->character_description;
    }
    public function setCharacterDescription(?string $character_description): void
    {
        $this->character_description = $character_description;
    }
    public function getCharacterImage(): ?string
    {
        return $this->character_image;
    }
    public function setCharacterImage(?string $character_image): void
    {
        $this->character_image = $character_image;
    }
    public function getCharacterName(): ?string
    {
        return $this->character_name;
    }
    public function setCharacterName(?string $character_name): void
    {
        $this->character_name = $character_name;
    }
    public function getCharacterClass(): ?string
    {
        return $this->character_class;
    }
    public function setCharacterClass(?string $character_class): void
    {
        $this->character_class = $character_class;
    }

    public static function getTableName(): string
    {
        return 'characters'; // TODO: Change the autogenerated stub
    }
}