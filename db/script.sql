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

