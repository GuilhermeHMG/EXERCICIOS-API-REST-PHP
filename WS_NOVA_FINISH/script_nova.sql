/*Todos os CNPJ's*/
SELECT procod_est, pronom_uni, proemp_est, proprt_est, provlr_est,
(proeat_est - proofc_est - provnd_est - proout_est) AS estoque
FROM tb_pcapro_est
INNER JOIN tb_pcapro_uni
ON procod_uni = procod_est where exists (select 1 from tb_transac, tb_trajuridi  
where tra_acesso=proemp_est and tra_sequence=tju_codigo) ORDER BY proemp_est;

/*CNPJ específico*/
SELECT procod_est, pronom_uni, proemp_est, proprt_est, provlr_est,
(proeat_est - proofc_est - provnd_est - proout_est) AS estoque
FROM tb_pcapro_est
INNER JOIN tb_pcapro_uni
ON procod_uni = procod_est where exists (select 1 from tb_transac, tb_trajuridi  
where tra_acesso=proemp_est and tra_sequence=tju_codigo and tju_cnpj = '72855505001463');

SELECT proeat_est, proofc_est, provnd_est, proout_est, PROCOD_EST FROM tb_pcapro_est WHERE PROCOD_EST = '15223484' and proemp_est='U00008';


UPDATE tb_pcapro_est SET proeat_est = '100' WHERE PROCOD_EST = '11056093' and proemp_est='U00008';
UPDATE tb_pcapro_est SET proeat_est = '600' WHERE PROCOD_EST = '15223484' and proemp_est='U00008';
UPDATE tb_pcapro_est SET proeat_est = '235' WHERE PROCOD_EST = '88905845' and proemp_est='U00008';
UPDATE tb_pcapro_est SET proeat_est = '460' WHERE PROCOD_EST = '93231110' and proemp_est='U00008';
UPDATE tb_pcapro_est SET proeat_est = '900' WHERE PROCOD_EST = '93281285' and proemp_est='U00008';
UPDATE tb_pcapro_est SET proeat_est = '500' WHERE PROCOD_EST = '93307462' and proemp_est='U00008';
UPDATE tb_pcapro_est SET proeat_est = '555' WHERE PROCOD_EST = '98550134' and proemp_est='U00008';
UPDATE tb_pcapro_est SET proeat_est = '345' WHERE PROCOD_EST = '98550553' and proemp_est='U00008';
UPDATE tb_pcapro_est SET proeat_est = '111' WHERE PROCOD_EST = '95461951' and proemp_est='U00008';
UPDATE tb_pcapro_est SET proeat_est = '444' WHERE PROCOD_EST = '52108786' and proemp_est='U00008';
UPDATE tb_pcapro_est SET proeat_est = '2500' WHERE PROCOD_EST = '22761890' and proemp_est='U00008';
UPDATE tb_pcapro_est SET proeat_est = '1500' WHERE PROCOD_EST = '93307430' and proemp_est='U00008';
UPDATE tb_pcapro_est SET proeat_est = '20' WHERE PROCOD_EST = '93305058' and proemp_est='U00008';
UPDATE tb_pcapro_est SET proeat_est = '1723' WHERE PROCOD_EST = '93305059' and proemp_est='U00008';
UPDATE tb_pcapro_est SET proeat_est = '532' WHERE PROCOD_EST = '93305060' and proemp_est='U00008';


/* page=828&limit=500 - 93307462 */
/* page=822&limit=500 - 93281285 Validations::validationEstock( */

SELECT procod_est, proemp_est, proprt_est, provlr_est,
(proeat_est - proofc_est - provnd_est - proout_est) AS estoque
FROM tb_pcapro_est WHERE procod_est = '93281285'and proemp_est='U00008';


    
    
    