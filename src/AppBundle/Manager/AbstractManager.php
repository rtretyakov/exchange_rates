<?php

/**
 * Exchange Rates
 *
 * @author rtretyakov
 * @link https://github.com/rtretyakov/exchange_rates
 */

namespace AppBundle\Manager;

use Doctrine\ORM\EntityManager;

/**
 * Абстрактный класс менеджеров
 *
 * @author rtretyakov
 * @link https://github.com/rtretyakov/exchange_rates
 */
abstract class AbstractManager
{
    /**
     * Менеджер сущностей
     *
     * @var EntityManager
     */
    protected $em;

    /**
     * @param EntityManager $em Менеджер сущностей
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Возвращает все сущности
     *
     * @return object[]
     */
    public function findAll()
    {
        return $this->getRepository()->findAll();
    }

    /**
     * Возвращает сущности по критериям
     *
     * @param array $criteria Критерии
     * @param array $orderBy Сортировка
     * @param integer|null $limit Лимит
     * @param integer|null $offset Смещение
     *
     * @return array
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->getRepository()->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * Возвращает менеджер сущностей
     *
     * @return EntityManager
     */
    protected function getEntityManager()
    {
        return $this->em;
    }

    /**
     * Возвращает хранилище
     *
     * @return \Doctrine\ORM\EntityRepository
     */
    protected function getRepository()
    {
        return $this->em->getRepository($this->getEntityClass());
    }

    /**
     * Возвращает название класса сущности
     *
     * @return null
     */
    protected function getEntityClass()
    {
        return null;
    }
}
