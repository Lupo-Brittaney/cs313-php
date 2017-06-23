--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.1
-- Dumped by pg_dump version 9.6.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: member; Type: TABLE; Schema: public; Owner: hdlspfgzaeithb
--

CREATE TABLE member (
    id integer NOT NULL,
    person_id integer NOT NULL,
    org_id integer NOT NULL,
    payamount integer NOT NULL,
    paytype character varying(40)
);


ALTER TABLE member OWNER TO hdlspfgzaeithb;

--
-- Name: member_id_seq; Type: SEQUENCE; Schema: public; Owner: hdlspfgzaeithb
--

CREATE SEQUENCE member_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE member_id_seq OWNER TO hdlspfgzaeithb;

--
-- Name: member_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: hdlspfgzaeithb
--

ALTER SEQUENCE member_id_seq OWNED BY member.id;


--
-- Name: org; Type: TABLE; Schema: public; Owner: hdlspfgzaeithb
--

CREATE TABLE org (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    fee integer NOT NULL,
    ownerid integer
);


ALTER TABLE org OWNER TO hdlspfgzaeithb;

--
-- Name: org_id_seq; Type: SEQUENCE; Schema: public; Owner: hdlspfgzaeithb
--

CREATE SEQUENCE org_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE org_id_seq OWNER TO hdlspfgzaeithb;

--
-- Name: org_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: hdlspfgzaeithb
--

ALTER SEQUENCE org_id_seq OWNED BY org.id;


--
-- Name: person; Type: TABLE; Schema: public; Owner: hdlspfgzaeithb
--

CREATE TABLE person (
    id integer NOT NULL,
    firstname character varying(20) NOT NULL,
    lastname character varying(20) NOT NULL,
    email character varying(40) NOT NULL
);


ALTER TABLE person OWNER TO hdlspfgzaeithb;

--
-- Name: person_id_seq; Type: SEQUENCE; Schema: public; Owner: hdlspfgzaeithb
--

CREATE SEQUENCE person_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE person_id_seq OWNER TO hdlspfgzaeithb;

--
-- Name: person_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: hdlspfgzaeithb
--

ALTER SEQUENCE person_id_seq OWNED BY person.id;


--
-- Name: member id; Type: DEFAULT; Schema: public; Owner: hdlspfgzaeithb
--

ALTER TABLE ONLY member ALTER COLUMN id SET DEFAULT nextval('member_id_seq'::regclass);


--
-- Name: org id; Type: DEFAULT; Schema: public; Owner: hdlspfgzaeithb
--

ALTER TABLE ONLY org ALTER COLUMN id SET DEFAULT nextval('org_id_seq'::regclass);


--
-- Name: person id; Type: DEFAULT; Schema: public; Owner: hdlspfgzaeithb
--

ALTER TABLE ONLY person ALTER COLUMN id SET DEFAULT nextval('person_id_seq'::regclass);


--
-- Data for Name: member; Type: TABLE DATA; Schema: public; Owner: hdlspfgzaeithb
--

COPY member (id, person_id, org_id, payamount, paytype) FROM stdin;
1	1	2	50	cash
2	2	1	55	cash
3	3	1	55	check
4	3	5	55	cash
6	4	5	55	cash
8	5	5	55	cash
10	6	5	55	check
12	1	6	22	cash
13	7	6	22	check
15	9	5	55	cash
\.


--
-- Name: member_id_seq; Type: SEQUENCE SET; Schema: public; Owner: hdlspfgzaeithb
--

SELECT pg_catalog.setval('member_id_seq', 15, true);


--
-- Data for Name: org; Type: TABLE DATA; Schema: public; Owner: hdlspfgzaeithb
--

COPY org (id, name, fee, ownerid) FROM stdin;
1	Hard Chargers	55	1
2	Sluggers	50	2
3	Hitters	55	2
5	Slammers	55	2
6	DerbyDogs	22	2
\.


--
-- Name: org_id_seq; Type: SEQUENCE SET; Schema: public; Owner: hdlspfgzaeithb
--

SELECT pg_catalog.setval('org_id_seq', 6, true);


--
-- Data for Name: person; Type: TABLE DATA; Schema: public; Owner: hdlspfgzaeithb
--

COPY person (id, firstname, lastname, email) FROM stdin;
1	Vince	Lupo	vl@mail.com
2	Sam	Smith	ss@mail.com
3	James	Jones	jj@mail.com
4	Chris	Chambers	cc@mail.com
5	Dave	Danger	dd@email.com
6	Eddie	Eagle	ee@mail.com
7	Mike	Mitchell	mm@mail.com
8	Nick	Nelson	nn@mail.com
9	Tony	Terrible	tt@mail.com
\.


--
-- Name: person_id_seq; Type: SEQUENCE SET; Schema: public; Owner: hdlspfgzaeithb
--

SELECT pg_catalog.setval('person_id_seq', 9, true);


--
-- Name: member member_pkey; Type: CONSTRAINT; Schema: public; Owner: hdlspfgzaeithb
--

ALTER TABLE ONLY member
    ADD CONSTRAINT member_pkey PRIMARY KEY (id);


--
-- Name: org org_pkey; Type: CONSTRAINT; Schema: public; Owner: hdlspfgzaeithb
--

ALTER TABLE ONLY org
    ADD CONSTRAINT org_pkey PRIMARY KEY (id);


--
-- Name: person person_email_key; Type: CONSTRAINT; Schema: public; Owner: hdlspfgzaeithb
--

ALTER TABLE ONLY person
    ADD CONSTRAINT person_email_key UNIQUE (email);


--
-- Name: person person_pkey; Type: CONSTRAINT; Schema: public; Owner: hdlspfgzaeithb
--

ALTER TABLE ONLY person
    ADD CONSTRAINT person_pkey PRIMARY KEY (id);


--
-- Name: member member_org_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: hdlspfgzaeithb
--

ALTER TABLE ONLY member
    ADD CONSTRAINT member_org_id_fkey FOREIGN KEY (org_id) REFERENCES org(id);


--
-- Name: member member_person_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: hdlspfgzaeithb
--

ALTER TABLE ONLY member
    ADD CONSTRAINT member_person_id_fkey FOREIGN KEY (person_id) REFERENCES person(id);


--
-- Name: org org_ownerid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: hdlspfgzaeithb
--

ALTER TABLE ONLY org
    ADD CONSTRAINT org_ownerid_fkey FOREIGN KEY (ownerid) REFERENCES person(id);


--
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO hdlspfgzaeithb;


--
-- PostgreSQL database dump complete
--

