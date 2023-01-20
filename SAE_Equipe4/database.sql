
/*
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

*/

create table formation(
    formation_id serial primary key,
    departement varchar(200),
    composante varchar(200)
);


create table personnel(
    personnel_id serial primary key,
    nom varchar(200),
    prenom varchar(200),
    mail varchar(200),
    visibility_flag boolean,
    role varchar(200),
    formation_id integer references formation(formation_id)
);


create table entreprise(
    entreprise_id serial primary key,
    nom varchar(200),
    description varchar(200),
    adresse varchar(200),
    telephone integer,
    lieu varchar(200)
);

create table etudiant(
    student_id serial primary key,
    nom varchar(200),
    prenom varchar(200),
    mail varchar(200),
    stage_detention boolean,
    visibility_flag boolean,
    entreprise_id integer references entreprise(entreprise_id),
    groupe varchar(200),
    personnel_id integer references personnel(personnel_id),
    formation_id integer references formation(formation_id) 
);


create table tuteur(
    tuteur_id serial primary key,
    nom varchar(200),
    entreprise_id integer references entreprise(entreprise_id),
    prenom varchar(200),
    contact varchar(200) 
);
create table stage(
    stage_id serial primary key,
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
    username varchar(200), 
    password varchar(200),
    user_id integer,
    role varchar(200)
);
create table document(
    document_id serial primary key,
    type varchar(300), 
    student_id integer references etudiant(student_id),
    date_heure timestamp,
    url varchar(400),
    version integer
);

create table bos(
    bos_id serial primary key,
    document_id integer references document(document_id),
    status varchar(200),
    bos_flag boolean 
);

create table commentaire(
    commentaire_id serial primary key,
    visibilite_flag integer, 
    enseignant_id integer,
    document_id integer references document(document_id),
    vue_flag boolean,
    commentaire varchar(200)
);
