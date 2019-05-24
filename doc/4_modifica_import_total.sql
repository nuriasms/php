UPDATE COMANDA C SET import_total = (SELECT sum(import)
                                   FROM LINIA_COMANDA LC
                                   WHERE LC.numcomanda = C.numcomanda);
