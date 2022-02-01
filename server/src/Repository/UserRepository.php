<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
// use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

//    /**
//     * @return User[] Returns an array of User objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function transform(User $user)
    {
        return [
                'id'    => (int) $user->getId(),
                'title' => (string) $user->getTitle(),
                'count' => (int) $user->getCount()
        ];
    }

    public function transformAll()
    {
        // $users = $this->findAll();
        $usersArray = [];

        // foreach ($users as $user) {
        //     // $usersArray[] = $this->transform($user);
        //     $usersArray[] = ['id' => 1, 'title' => 'title1', 'count' => 'count1'];
        // }
        for ($i=0; $i < 5; $i++) { 
            $usersArray[] = ['id' => 1, 'title' => 'title1', 'count' => 'count1'];
        }

        return $usersArray;
    }
}
