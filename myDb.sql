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
    org_id integer NOT NULL
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
    fee integer NOT NULL
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
-- Name: payment; Type: TABLE; Schema: public; Owner: hdlspfgzaeithb
--

CREATE TABLE payment (
    id integer NOT NULL,
    member_id integer NOT NULL,
    payment integer NOT NULL,
    date date
);


ALTER TABLE payment OWNER TO hdlspfgzaeithb;

--
-- Name: payment_id_seq; Type: SEQUENCE; Schema: public; Owner: hdlspfgzaeithb
--

CREATE SEQUENCE payment_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE payment_id_seq OWNER TO hdlspfgzaeithb;

--
-- Name: payment_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: hdlspfgzaeithb
--

ALTER SEQUENCE payment_id_seq OWNED BY payment.id;


--
-- Name: user; Type: TABLE; Schema: public; Owner: hdlspfgzaeithb
--

CREATE TABLE "user" (
    id integer NOT NULL,
    firstname character varying(20) NOT NULL,
    lastname character varying(20) NOT NULL,
    email character varying(40) NOT NULL
);


ALTER TABLE "user" OWNER TO hdlspfgzaeithb;

--
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: hdlspfgzaeithb
--

CREATE SEQUENCE user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE user_id_seq OWNER TO hdlspfgzaeithb;

--
-- Name: user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: hdlspfgzaeithb
--

ALTER SEQUENCE user_id_seq OWNED BY "user".id;


--
-- Name: member id; Type: DEFAULT; Schema: public; Owner: hdlspfgzaeithb
--

ALTER TABLE ONLY member ALTER COLUMN id SET DEFAULT nextval('member_id_seq'::regclass);


--
-- Name: org id; Type: DEFAULT; Schema: public; Owner: hdlspfgzaeithb
--

ALTER TABLE ONLY org ALTER COLUMN id SET DEFAULT nextval('org_id_seq'::regclass);


--
-- Name: payment id; Type: DEFAULT; Schema: public; Owner: hdlspfgzaeithb
--

ALTER TABLE ONLY payment ALTER COLUMN id SET DEFAULT nextval('payment_id_seq'::regclass);


--
-- Name: user id; Type: DEFAULT; Schema: public; Owner: hdlspfgzaeithb
--

ALTER TABLE ONLY "user" ALTER COLUMN id SET DEFAULT nextval('user_id_seq'::regclass);


--
-- Data for Name: member; Type: TABLE DATA; Schema: public; Owner: hdlspfgzaeithb
--

COPY member (id, person_id, org_id) FROM stdin;
\.


--
-- Name: member_id_seq; Type: SEQUENCE SET; Schema: public; Owner: hdlspfgzaeithb
--

SELECT pg_catalog.setval('member_id_seq', 1, false);


--
-- Data for Name: org; Type: TABLE DATA; Schema: public; Owner: hdlspfgzaeithb
--

COPY org (id, name, fee) FROM stdin;
\.


--
-- Name: org_id_seq; Type: SEQUENCE SET; Schema: public; Owner: hdlspfgzaeithb
--

SELECT pg_catalog.setval('org_id_seq', 1, false);


--
-- Data for Name: payment; Type: TABLE DATA; Schema: public; Owner: hdlspfgzaeithb
--

COPY payment (id, member_id, payment, date) FROM stdin;
\.


--
-- Name: payment_id_seq; Type: SEQUENCE SET; Schema: public; Owner: hdlspfgzaeithb
--

SELECT pg_catalog.setval('payment_id_seq', 1, false);


--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: hdlspfgzaeithb
--

COPY "user" (id, firstname, lastname, email) FROM stdin;
\.


--
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: hdlspfgzaeithb
--

SELECT pg_catalog.setval('user_id_seq', 1, false);


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
-- Name: payment payment_pkey; Type: CONSTRAINT; Schema: public; Owner: hdlspfgzaeithb
--

ALTER TABLE ONLY payment
    ADD CONSTRAINT payment_pkey PRIMARY KEY (id);


--
-- Name: user user_email_key; Type: CONSTRAINT; Schema: public; Owner: hdlspfgzaeithb
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_email_key UNIQUE (email);


--
-- Name: user user_pkey; Type: CONSTRAINT; Schema: public; Owner: hdlspfgzaeithb
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);


--
-- Name: member member_org_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: hdlspfgzaeithb
--

ALTER TABLE ONLY member
    ADD CONSTRAINT member_org_id_fkey FOREIGN KEY (org_id) REFERENCES org(id);


--
-- Name: member member_person_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: hdlspfgzaeithb
--

ALTER TABLE ONLY member
    ADD CONSTRAINT member_person_id_fkey FOREIGN KEY (person_id) REFERENCES "user"(id);


--
-- Name: payment payment_member_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: hdlspfgzaeithb
--

ALTER TABLE ONLY payment
    ADD CONSTRAINT payment_member_id_fkey FOREIGN KEY (member_id) REFERENCES member(id);


--
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO hdlspfgzaeithb;


--
-- PostgreSQL database dump complete
--

