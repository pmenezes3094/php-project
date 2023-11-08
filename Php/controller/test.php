SELECT i.itemDetail,i.itemTypeId,it.itemType FROM `tag` t,item i,itemtype it where t.tagId=i.tagId and t.tagName='hii'
and it.itemTypeId=i.itemTypeId