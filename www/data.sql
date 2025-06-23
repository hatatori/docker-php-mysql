CREATE DATABASE cinema;
use cinema;

CREATE TABLE  filmes (
    id INT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    sinopse TEXT,
    ano_lancamento DATE,
    titulo_original VARCHAR(255),
    idioma_original VARCHAR(10),
    orcamento BIGINT,
    bilheteria BIGINT,
    imagem VARCHAR(500)
);

INSERT INTO  filmes (
    id, nome, sinopse, ano_lancamento, titulo_original, idioma_original, orcamento, bilheteria, imagem
) VALUES
(1, 'Inception', 'Dom Cobb é um ladrão que invade os sonhos para roubar segredos.', '2010-01-01', 'Inception', 'en', 160000000, 829895144, 'https://image.tmdb.org/t/p/w600_and_h900_bestv2/9e3Dz7aCANy5aRUQF745IlNloJ1.jpg'),
(2, 'Interstellar', 'Exploradores viajam por um buraco de minhoca para salvar a humanidade.', '2014-01-01', 'Interstellar', 'en', 165000000, 677471339, 'https://image.tmdb.org/t/p/w600_and_h900_bestv2/rAiYTfKGqDCRIIqo664sY9XZIvQ.jpg'),
(3, 'The Dark Knight', 'Batman enfrenta o Coringa para salvar Gotham City.', '2008-01-01', 'The Dark Knight', 'en', 185000000, 1004558444, 'https://image.tmdb.org/t/p/w600_and_h900_bestv2/qJ2tW6WMUDux911r6m7haRef0WH.jpg'),
(4, 'Parasite', 'Família pobre se infiltra na vida de família rica.', '2019-01-01', 'Gisaengchung', 'ko', 11400000, 258708367, 'https://image.tmdb.org/t/p/w600_and_h900_bestv2/7IiTTgloJzvGI1TAYymCfbfl3vT.jpg'),
(5, 'Avengers: Endgame', 'Heróis tentam reverter o estalo de Thanos.', '2019-01-01', 'Avengers: Endgame', 'en', 356000000, 2797800564, 'https://image.tmdb.org/t/p/w600_and_h900_bestv2/or06FN3Dka5tukK1e9sl16pB3iy.jpg'),
(6, 'Joker', 'A origem do vilão Coringa.', '2019-01-01', 'Joker', 'en', 55000000, 1074251311, 'https://image.tmdb.org/t/p/w600_and_h900_bestv2/udDclJoHjfjb8Ekgsd4FDteOkCU.jpg'),
(7, 'The Lion King', 'História do jovem leão Simba.', '2019-01-01', 'The Lion King', 'en', 260000000, 1656943394, 'https://image.tmdb.org/t/p/w600_and_h900_bestv2/2bXbqYdUdNVa8VIWXVfclP2ICtT.jpg'),
(8, 'Frozen II', 'Anna e Elsa buscam a origem dos poderes de Elsa.', '2019-01-01', 'Frozen II', 'en', 150000000, 1450026933, 'https://image.tmdb.org/t/p/w600_and_h900_bestv2/pjeMs3yqRmFL3giJy4PMXWZTTPa.jpg'),
(9, 'Titanic', 'Romance a bordo do navio Titanic.', '1997-01-01', 'Titanic', 'en', 200000000, 2187463944, 'https://image.tmdb.org/t/p/w600_and_h900_bestv2/6VmFqApQRyZZzmiGOQq2C92jyvH.jpg'),
(10, 'Avatar', 'Homem em planeta alienígena se envolve em conflito.', '2009-01-01', 'Avatar', 'en', 237000000, 2847246203, 'https://image.tmdb.org/t/p/w600_and_h900_bestv2/iNMP8uzV2Ing6ZCw0IICgEFVNfC.jpg');
