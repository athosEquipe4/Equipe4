
set datestyle to "ISO , DMY";


drop table if exists formation CASCADE;
drop table if exists personnel CASCADE;
drop table if exists entreprise CASCADE;
drop table if exists etudiant CASCADE;
drop table if exists tuteur CASCADE;
drop table if exists stage CASCADE;
drop table if exists login CASCADE;
drop table if exists document CASCADE;
drop table if exists bos CASCADE;
drop table if exists commentaire CASCADE;



create table formation(
    formation_id integer primary key not null,
    departement varchar(50),
    composante varchar(50)
);

create table personnel(
    personnel_id integer primary key not null,
    nom varchar(30),
    prenom varchar(30),
    mail varchar(50),
    visibility_flag boolean,
    role varchar(30),
    formation_id integer references formation(formation_id)
);

create table entreprise(
    entreprise_id integer primary key not null,
    nom varchar(30),
    description varchar(50),
    adresse varchar(100),
    telephone integer,
    lieu varchar(50)
);

create table etudiant(
    student_id integer primary key not null,
    nom varchar(30),
    prenom varchar(30),
    mail varchar(50),
    stage_detention boolean,
    visibility_flag boolean,
    entreprise_id integer references entreprise(entreprise_id),
    groupe varchar(30),
    personnel_id integer references personnel(personnel_id),
    formation_id integer references formation(formation_id) 
);

create table tuteur(
    tuteur_id integer primary key not null,
    nom varchar(30),
    entreprise_id integer references entreprise(entreprise_id),
    prenom varchar(30),
    contact varchar(50)
);

create table stage(
    stage_id integer primary key not null,
    mission varchar(200),
    student_id integer references etudiant(student_id),
    annee integer,
    personnel_id integer references personnel(personnel_id),
    duree integer,
    tuteur_id integer references tuteur(tuteur_id),
    gratification boolean,
    teletravail integer
);

create table login(
    username varchar(50),
    password varchar(15),
    user_id integer,
    role boolean
);
create table document(
    document_id integer primary key not null,
    type varchar(50),
    student_id integer references etudiant(student_id),
    date_heure timestamp,
    url varchar(150),
    version integer
);

create table bos(
    bos_id integer primary key not null,
    document_id integer references document(document_id),
    status varchar(30),
    bos_flag boolean
);

create table commentaire(
    commentaire_id integer primary key not null,
    visibilite_flag integer,
    enseignant_id integer,
    document_id integer references document(document_id),
    vue_flag boolean,
    commentaire varchar(150)
);

/*
create or replace procedure insert_formation(_formation_id integer,_departement varchar(50),_composante varchar(50))
as $$ 
    INSERT INTO formation(formation_id,departement,composante) VALUES (_formation_id,_departement,_composante);
$$ LANGUAGE SQL;
*/

/*
create or replace procedure insert_personnel
(
    _personnel_id integer,
    _nom varchar(30),
    _prenom varchar(30),
    _mail varchar(50),
    _visibility_flag boolean,
    _role varchar(30),
    _formation_id integer
) as $$ 
    INSERT INTO formation(formation_id,departement,composante) VALUES (_formation_id,_departement,_composante);
*/