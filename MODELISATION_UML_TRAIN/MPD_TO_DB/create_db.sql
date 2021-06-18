
CREATE SEQUENCE public.niveau_bug_id_seq;

CREATE TABLE public.niveau_bug (
                id INTEGER NOT NULL DEFAULT nextval('public.niveau_bug_id_seq'),
                ordre INTEGER NOT NULL,
                libelle VARCHAR(100) NOT NULL,
                CONSTRAINT niveau_bug_pk PRIMARY KEY (id)
);


ALTER SEQUENCE public.niveau_bug_id_seq OWNED BY public.niveau_bug.id;

CREATE SEQUENCE public.projet_id_seq;

CREATE TABLE public.projet (
                id INTEGER NOT NULL DEFAULT nextval('public.projet_id_seq'),
                nom VARCHAR(100) NOT NULL,
                date_creation TIMESTAMP NOT NULL,
                cloture BOOLEAN NOT NULL,
                CONSTRAINT projet_pk PRIMARY KEY (id)
);


ALTER SEQUENCE public.projet_id_seq OWNED BY public.projet.id;

CREATE TABLE public.version (
                iprojet_d INTEGER NOT NULL,
                numero VARCHAR(30) NOT NULL,
                CONSTRAINT version_pk PRIMARY KEY (iprojet_d, numero)
);


CREATE TABLE public.ticket (
                numero INTEGER NOT NULL,
                titre VARCHAR(300) NOT NULL,
                date TIMESTAMP NOT NULL,
                description VARCHAR(1000) NOT NULL,
                CONSTRAINT ticket_pk PRIMARY KEY (numero)
);


CREATE TABLE public.bug (
                ticket_numero INTEGER NOT NULL,
                niveau_bug_id INTEGER NOT NULL,
                CONSTRAINT bug_pk PRIMARY KEY (ticket_numero)
);


CREATE TABLE public.evolution (
                ticket_numero INTEGER NOT NULL,
                priorite INTEGER NOT NULL,
                CONSTRAINT evolution_pk PRIMARY KEY (ticket_numero)
);


CREATE SEQUENCE public.statut_id_seq;

CREATE TABLE public.statut (
                id INTEGER NOT NULL DEFAULT nextval('public.statut_id_seq'),
                libelle VARCHAR(100) NOT NULL,
                CONSTRAINT statut_pk PRIMARY KEY (id)
);


ALTER SEQUENCE public.statut_id_seq OWNED BY public.statut.id;

CREATE SEQUENCE public.utilisateur_id_seq;

CREATE TABLE public.utilisateur (
                id INTEGER NOT NULL DEFAULT nextval('public.utilisateur_id_seq'),
                nom VARCHAR(100) NOT NULL,
                prenom VARCHAR(100) NOT NULL,
                CONSTRAINT utilisateur_pk PRIMARY KEY (id)
);


ALTER SEQUENCE public.utilisateur_id_seq OWNED BY public.utilisateur.id;

CREATE TABLE public.commentaire (
                id INTEGER NOT NULL,
                description VARCHAR(1000) NOT NULL,
                utilisateur_id INTEGER NOT NULL,
                CONSTRAINT commentaire_pk PRIMARY KEY (id)
);


ALTER TABLE public.bug ADD CONSTRAINT niveau_bug_bug_fk
FOREIGN KEY (niveau_bug_id)
REFERENCES public.niveau_bug (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.version ADD CONSTRAINT projet_version_fk
FOREIGN KEY (iprojet_d)
REFERENCES public.projet (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.evolution ADD CONSTRAINT ticket_evolution_fk
FOREIGN KEY (ticket_numero)
REFERENCES public.ticket (numero)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.bug ADD CONSTRAINT ticket_bug_fk
FOREIGN KEY (ticket_numero)
REFERENCES public.ticket (numero)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.commentaire ADD CONSTRAINT utilisateur_commentaire_fk
FOREIGN KEY (utilisateur_id)
REFERENCES public.utilisateur (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;
