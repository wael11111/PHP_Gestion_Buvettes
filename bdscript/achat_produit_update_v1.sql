ALTER TABLE achat_produit
    DROP FOREIGN KEY fk_achat_produit_produit,
    DROP FOREIGN KEY fk_achat_produit_bar;
ALTER TABLE achat_produit
DROP PRIMARY KEY;

ALTER TABLE achat_produit
    ADD COLUMN id_achat_produit bigint UNSIGNED NOT NULL FIRST;

ALTER TABLE achat_produit
    ADD PRIMARY KEY (id_achat_produit),
    ADD UNIQUE KEY id_achat_produit (id_achat_produit);
ALTER TABLE achat_produit
    MODIFY id_achat_produit bigint UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE achat_produit
    ADD CONSTRAINT fk_achat_produit_produit
        FOREIGN KEY (id_produit) REFERENCES produit(id_produit)
            ON DELETE RESTRICT ON UPDATE RESTRICT,
ADD CONSTRAINT fk_achat_produit_bar
    FOREIGN KEY (bar_associe) REFERENCES bar(id_bar)
    ON DELETE RESTRICT ON UPDATE RESTRICT;
