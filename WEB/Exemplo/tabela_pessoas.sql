
CREATE TABLE pessoas
(
    id       serial NOT NULL,
    nome     character varying(150) NOT NULL,    
    urlfoto  character varying(350),    
    sobre    text,
    PRIMARY KEY (id)
)
WITH (
    OIDS = FALSE
);

ALTER TABLE public.series
    OWNER to postgres;
	SELECT * FROM pessoas;