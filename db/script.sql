ALTER TABLE  `laproducts` CHANGE  `ladatenew`  `ladatenew` VARCHAR( 50 ) NULL DEFAULT  '0';

/* TANNER  7/4*/
/* 10:26:33 AM localhost */ ALTER TABLE `laorders` ADD `giamvoucher` INT  NULL  DEFAULT NULL  AFTER `voucher`;
/* 10:26:57 AM localhost */ ALTER TABLE `laorders` ADD `sumsanpham` INT  NULL  DEFAULT NULL  AFTER `giamvoucher`;


/* tanner 2/4 */
/* 1:49:16 PM localhost */ ALTER TABLE `laproducts` ADD `laproduct_id` VARCHAR(50)  NULL  DEFAULT NULL  AFTER `lavariant_id`;


/* nha 1/4 */
ALTER TABLE `laproducts`
  ADD COLUMN `lakhoiluong` VARCHAR(20) NULL AFTER `created_at`,
  ADD COLUMN `ladungtich` VARCHAR(20) NULL AFTER `lakhoiluong`,
  ADD COLUMN `laview` INT DEFAULT 0  NOT NULL AFTER `ladungtich`,
  ADD COLUMN `lachucnang` VARCHAR(100) NULL AFTER `laview`,
  ADD COLUMN `lavariant_id` INT DEFAULT 0  NOT NULL AFTER `lachucnang`;

  ALTER TABLE `lacategories`
  ADD  UNIQUE INDEX `url` (`laurl`);
   ALTER TABLE `lamanufactors`
  ADD  UNIQUE INDEX `url` (`laurl`);
   ALTER TABLE `laproducts`
  ADD  UNIQUE INDEX `url` (`laurl`);

