CREATE OR REPLACE 
    VIEW `v_categories`
    AS
    SELECT 
    c.*,
    COUNT(p.id) numproduct
    FROM lacategories c
    LEFT JOIN v_products p
    ON p.cat1id = c.id OR p.cat2id = c.id OR p.cat3id = c.id
    WHERE c.ladeleted != 1 OR c.ladeleted IS NULL
    GROUP BY c.id