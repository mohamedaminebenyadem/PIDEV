<?php

namespace App\Entity;
use Doctrine\DBAL\Types\Types; 

use App\Repository\ReclamationRepository;
use Doctrine\ORM\Mapping as ORM;




use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: ReclamationRepository::class)]
class Reclamation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\NotBlank(message: 'Veuillez saisir votre nom')]
    #[Assert\Regex(pattern:"/^\D+$/" , message:"Le nom ne doit pas contenir de chiffres")]
    private ?string $nom = null;


    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\NotBlank(message: 'Veuillez saisir votre nom')]
    #[Assert\Regex(pattern:"/^\D+$/" , message:"Le prenom ne doit pas contenir de chiffres")]
    private ?string $prenom = null;

     
    #[ORM\Column(type: 'string', length: 180, unique: true)]
    #[Assert\NotBlank(message: 'Veuillez saisir un e-mail')]
    #[Assert\Regex(
        pattern: '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|tn)$/',
        message: 'L\'email "{{ value }}" n\'est pas valide. Veuillez saisir une adresse email valide se terminant par ".com" ou ".tn et contient "@"".'
    )]

private ?string $email = null;
    

    #[ORM\Column(nullable: true)]
    #[Assert\NotBlank(message: 'Veuillez saisir votre numero')]
    #[Assert\Regex(pattern:"/^[259][0-9]{7}$/" , message:"Le numéro de téléphone doit commencer par 2, 5 ou 9 et avoir 8 chiffres au total.")]  
 private ?int $tel = null;

    
    



    #[ORM\Column(length: 1000)]
  
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\GreaterThan("today")]
    
    private ?\DateTimeInterface $date_reclamation = null;

 

   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

 

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateReclamation(): ?\DateTimeInterface
    {
        return $this->date_reclamation;
    }

    public function setDateReclamation(\DateTimeInterface $date_reclamation): self
    {
        $this->date_reclamation = $date_reclamation;

        return $this;
    }

   

   
}