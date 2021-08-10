<?php


namespace Yengec\Model\Mapper;


use Yengec\Model\Lists\PackageList;

class PackageListMapper extends YengecResourceMapper
{
    public static function create($rawData = null): PackageListMapper
    {
        return new PackageListMapper($rawData);
    }

    public function mapPackageListFrom(PackageList $list, $jsonObject): PackageList
    {
            parent::mapResourceFrom($list, $jsonObject);

            if(isset($jsonObject->meta->pagination->total))
                $list->setTotal($jsonObject->meta->pagination->total);

            if(isset($jsonObject->meta->pagination->count))
                $list->setCount($jsonObject->meta->pagination->count);

            if(isset($jsonObject->meta->pagination->per_page))
                $list->setPerPage($jsonObject->meta->pagination->per_page);

            if(isset($jsonObject->meta->pagination->current_page))
                $list->setCurrentPage($jsonObject->meta->pagination->current_page);

            if(isset($jsonObject->meta->pagination->total_pages))
                $list->setTotalPages($jsonObject->meta->pagination->total_pages);

            if(isset($jsonObject->meta->pagination->links))
                $list->setLinks($jsonObject->meta->pagination->links);

            if(isset($jsonObject->data))
                $list->setData($jsonObject->data);

            return $list;
    }

    public function mapPackageList(PackageList $list): PackageList
    {
        return $this->mapPackageListFrom($list, $this->jsonObject);
    }

}