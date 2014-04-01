CREATE OR REPLACE 
    VIEW `v_products`
    AS
    SELECT p.*,
    c1.id cat1id, c1.latitle cat1name, c1.laurl cat1url,
    COALESCE(c2.id,0) cat2id, COALESCE(c2.latitle,'') cat2name,COALESCE(c2.laurl,'') cat2url,
    COALESCE(c3.id,0) cat3id, COALESCE(c3.latitle,'') cat3name,COALESCE(c3.laurl,'') cat3url,
    f.id factorid, f.latitle factorname
     FROM laproducts p
    LEFT OUTER JOIN lamanufactors f 
    ON f.id = p.lamanufactor_id
    LEFT OUTER JOIN lacategories c1
    ON c1.id = p.lacategory_id
    LEFT OUTER JOIN lacategories c2
    ON c1.laparent_id = c2.id
    LEFT OUTER JOIN lacategories c3
    ON c2.laparent_id = c3.id
    WHERE p.ladeleted != 1 OR p.ladeleted IS NULL