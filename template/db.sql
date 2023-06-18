CREATE DATABASE IF NOT EXISTS GRAVITY;

use GRAVITY;

;country_id_o;country_id_d;distw_harmonic;distw_arithmetic;dist;distcap;contig;comlang_off;comcol;comrelig;pop_o;pop_d;gdp_o;gdp_d;pop_pwt_o


CREATE TABLE IF NOT EXISTS journals(
    id integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
    year date null,
    DateFrom varchar(20) null,
    DateTo varchar(20) null,
    IsAdminLog boolean null DEFAULT 0,
    MaxResults integer null,
    SubscriberId integer null,
    Created_at datetime DEFAULT now()
);
