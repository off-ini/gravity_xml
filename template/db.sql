CREATE DATABASE IF NOT EXISTS GRAVITY_DB;

use GRAVITY_DB;

CREATE TABLE IF NOT EXISTS gravity(
    gravity_id varchar(32) PRIMARY KEY NOT NULL,
    year varchar(8) null,
    country_id_o varchar(8) null,
    country_id_d varchar(8) null,
    distw_harmonic integer null,
    distw_arithmetic integer null,
    dist integer null,
    distcap integer null,
    contig integer null DEFAULT 0,
    comlang_off integer null DEFAULT 0,
    comcol integer null DEFAULT 0,
    comrelig float null,
    pop_o float null,
    pop_d float null,
    gdp_o float null,
    gdp_d float null,
    pop_pwt_o float null
);
