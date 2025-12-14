--
-- PostgreSQL database dump
--

\restrict 4u0xbMvspXqypjB2tNfY8hXtFv05ngnqe90VZu3fC2p8qQqfaEWPH39pDeXdT99

-- Dumped from database version 17.6
-- Dumped by pg_dump version 18.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: public; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA public;


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: admin; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.admin (
    admin_id integer NOT NULL,
    username character varying(100) NOT NULL,
    password_hash character varying(255) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


--
-- Name: admin_admin_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.admin_admin_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: admin_admin_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.admin_admin_id_seq OWNED BY public.admin.admin_id;


--
-- Name: contact_message; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.contact_message (
    message_id integer NOT NULL,
    full_name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    message_text text NOT NULL,
    is_read boolean DEFAULT false,
    received_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


--
-- Name: contact_message_message_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.contact_message_message_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: contact_message_message_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.contact_message_message_id_seq OWNED BY public.contact_message.message_id;


--
-- Name: gallery_item; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.gallery_item (
    item_id integer NOT NULL,
    title character varying(255) NOT NULL,
    item_date date,
    image_url character varying(255) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


--
-- Name: gallery_item_item_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.gallery_item_item_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: gallery_item_item_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.gallery_item_item_id_seq OWNED BY public.gallery_item.item_id;


--
-- Name: guestbook_message; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.guestbook_message (
    message_id integer NOT NULL,
    full_name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    institution character varying(255),
    phone_number character varying(50),
    message_text text NOT NULL,
    is_read boolean DEFAULT false,
    received_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


--
-- Name: guestbook_message_message_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.guestbook_message_message_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: guestbook_message_message_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.guestbook_message_message_id_seq OWNED BY public.guestbook_message.message_id;


--
-- Name: news; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.news (
    news_id integer NOT NULL,
    title character varying(255) NOT NULL,
    description text NOT NULL,
    image_url character varying(255),
    author_id integer NOT NULL,
    publish_date date NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


--
-- Name: news_news_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.news_news_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: news_news_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.news_news_id_seq OWNED BY public.news.news_id;


--
-- Name: product; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.product (
    product_id integer NOT NULL,
    product_name character varying(255) NOT NULL,
    description text NOT NULL,
    link_url character varying(255) NOT NULL,
    image_url character varying(255),
    categories text[] DEFAULT '{}'::text[],
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


--
-- Name: product_product_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.product_product_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: product_product_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.product_product_id_seq OWNED BY public.product.product_id;


--
-- Name: settings; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.settings (
    id integer NOT NULL,
    setting_key character varying(100) NOT NULL,
    setting_value text,
    updated_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


--
-- Name: settings_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.settings_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: settings_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.settings_id_seq OWNED BY public.settings.id;


--
-- Name: team_member; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.team_member (
    member_id integer NOT NULL,
    admin_id integer,
    full_name character varying(255) NOT NULL,
    nip character varying(50) NOT NULL,
    phone_number character varying(50) NOT NULL,
    email character varying(255) NOT NULL,
    facebook_url character varying(255),
    instagram_url character varying(255),
    google_scholar_url character varying(255),
    photo_url character varying(255),
    "position" character varying(255),
    detail_url character varying(255),
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


--
-- Name: team_member_member_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.team_member_member_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: team_member_member_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.team_member_member_id_seq OWNED BY public.team_member.member_id;


--
-- Name: visitor_log; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.visitor_log (
    log_id bigint NOT NULL,
    ip_address inet NOT NULL,
    user_agent text,
    visit_timestamp timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


--
-- Name: v_visitor_stats; Type: VIEW; Schema: public; Owner: -
--

CREATE VIEW public.v_visitor_stats AS
 SELECT ( SELECT count(DISTINCT visitor_log.ip_address) AS count
           FROM public.visitor_log
          WHERE (visitor_log.visit_timestamp >= (CURRENT_DATE - '7 days'::interval))) AS visitors_last_7_days,
    ( SELECT count(DISTINCT visitor_log.ip_address) AS count
           FROM public.visitor_log
          WHERE (visitor_log.visit_timestamp >= (CURRENT_DATE - '28 days'::interval))) AS visitors_last_28_days,
    ( SELECT count(DISTINCT visitor_log.ip_address) AS count
           FROM public.visitor_log
          WHERE (visitor_log.visit_timestamp >= (CURRENT_DATE - '60 days'::interval))) AS visitors_last_60_days,
    ( SELECT count(DISTINCT visitor_log.ip_address) AS count
           FROM public.visitor_log
          WHERE (visitor_log.visit_timestamp >= (CURRENT_DATE - '365 days'::interval))) AS visitors_last_365_days,
    ( SELECT count(DISTINCT visitor_log.ip_address) AS count
           FROM public.visitor_log) AS visitors_total;


--
-- Name: v_dashboard_summary; Type: VIEW; Schema: public; Owner: -
--

CREATE VIEW public.v_dashboard_summary AS
 SELECT ( SELECT count(*) AS count
           FROM public.news) AS total_news,
    ( SELECT count(*) AS count
           FROM public.product) AS total_product,
    ( SELECT count(*) AS count
           FROM public.team_member) AS total_team_members,
    ( SELECT v_visitor_stats.visitors_total
           FROM public.v_visitor_stats) AS total_visitor;


--
-- Name: v_new_messages_count; Type: VIEW; Schema: public; Owner: -
--

CREATE VIEW public.v_new_messages_count AS
 SELECT (( SELECT count(*) AS count
           FROM public.contact_message
          WHERE (contact_message.is_read = false)) + ( SELECT count(*) AS count
           FROM public.guestbook_message
          WHERE (guestbook_message.is_read = false))) AS new_message_count;


--
-- Name: v_recent_news; Type: VIEW; Schema: public; Owner: -
--

CREATE VIEW public.v_recent_news AS
 SELECT n.news_id,
    n.title,
    n.publish_date,
    tm.full_name AS author_name
   FROM (public.news n
     LEFT JOIN public.team_member tm ON ((n.author_id = tm.member_id)))
  ORDER BY n.publish_date DESC
 LIMIT 5;


--
-- Name: v_recent_products; Type: VIEW; Schema: public; Owner: -
--

CREATE VIEW public.v_recent_products AS
 SELECT product_id,
    product_name
   FROM public.product
  ORDER BY created_at DESC
 LIMIT 5;


--
-- Name: visitor_log_log_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.visitor_log_log_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: visitor_log_log_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.visitor_log_log_id_seq OWNED BY public.visitor_log.log_id;


--
-- Name: admin admin_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.admin ALTER COLUMN admin_id SET DEFAULT nextval('public.admin_admin_id_seq'::regclass);


--
-- Name: contact_message message_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.contact_message ALTER COLUMN message_id SET DEFAULT nextval('public.contact_message_message_id_seq'::regclass);


--
-- Name: gallery_item item_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.gallery_item ALTER COLUMN item_id SET DEFAULT nextval('public.gallery_item_item_id_seq'::regclass);


--
-- Name: guestbook_message message_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.guestbook_message ALTER COLUMN message_id SET DEFAULT nextval('public.guestbook_message_message_id_seq'::regclass);


--
-- Name: news news_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.news ALTER COLUMN news_id SET DEFAULT nextval('public.news_news_id_seq'::regclass);


--
-- Name: product product_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.product ALTER COLUMN product_id SET DEFAULT nextval('public.product_product_id_seq'::regclass);


--
-- Name: settings id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.settings ALTER COLUMN id SET DEFAULT nextval('public.settings_id_seq'::regclass);


--
-- Name: team_member member_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.team_member ALTER COLUMN member_id SET DEFAULT nextval('public.team_member_member_id_seq'::regclass);


--
-- Name: visitor_log log_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.visitor_log ALTER COLUMN log_id SET DEFAULT nextval('public.visitor_log_log_id_seq'::regclass);


--
-- Name: admin admin_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_pkey PRIMARY KEY (admin_id);


--
-- Name: admin admin_username_key; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_username_key UNIQUE (username);


--
-- Name: contact_message contact_message_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.contact_message
    ADD CONSTRAINT contact_message_pkey PRIMARY KEY (message_id);


--
-- Name: gallery_item gallery_item_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.gallery_item
    ADD CONSTRAINT gallery_item_pkey PRIMARY KEY (item_id);


--
-- Name: guestbook_message guestbook_message_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.guestbook_message
    ADD CONSTRAINT guestbook_message_pkey PRIMARY KEY (message_id);


--
-- Name: news news_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.news
    ADD CONSTRAINT news_pkey PRIMARY KEY (news_id);


--
-- Name: product product_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.product
    ADD CONSTRAINT product_pkey PRIMARY KEY (product_id);


--
-- Name: settings settings_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.settings
    ADD CONSTRAINT settings_pkey PRIMARY KEY (id);


--
-- Name: settings settings_setting_key_key; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.settings
    ADD CONSTRAINT settings_setting_key_key UNIQUE (setting_key);


--
-- Name: team_member team_member_admin_id_key; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.team_member
    ADD CONSTRAINT team_member_admin_id_key UNIQUE (admin_id);


--
-- Name: team_member team_member_email_key; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.team_member
    ADD CONSTRAINT team_member_email_key UNIQUE (email);


--
-- Name: team_member team_member_nip_key; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.team_member
    ADD CONSTRAINT team_member_nip_key UNIQUE (nip);


--
-- Name: team_member team_member_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.team_member
    ADD CONSTRAINT team_member_pkey PRIMARY KEY (member_id);


--
-- Name: visitor_log visitor_log_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.visitor_log
    ADD CONSTRAINT visitor_log_pkey PRIMARY KEY (log_id);


--
-- Name: team_member fk_admin; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.team_member
    ADD CONSTRAINT fk_admin FOREIGN KEY (admin_id) REFERENCES public.admin(admin_id) ON DELETE SET NULL;


--
-- Name: news fk_author; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.news
    ADD CONSTRAINT fk_author FOREIGN KEY (author_id) REFERENCES public.team_member(member_id) ON DELETE SET NULL;


--
-- Name: admin; Type: ROW SECURITY; Schema: public; Owner: -
--

ALTER TABLE public.admin ENABLE ROW LEVEL SECURITY;

--
-- Procedure: sp_create_team_member
-- Description: Inserts a new admin and team member in a single atomic operation.
--

CREATE OR REPLACE PROCEDURE public.sp_create_team_member(
    IN p_username character varying,
    IN p_password_hash character varying,
    IN p_full_name character varying,
    IN p_nip character varying,
    IN p_phone_number character varying,
    IN p_email character varying,
    IN p_position character varying,
    IN p_facebook_url character varying,
    IN p_instagram_url character varying,
    IN p_google_scholar_url character varying,
    IN p_detail_url character varying,
    IN p_photo_url character varying
)
LANGUAGE plpgsql
AS $$
DECLARE
    v_admin_id integer;
BEGIN
    -- Insert into admin table
    INSERT INTO public.admin (username, password_hash, created_at)
    VALUES (p_username, p_password_hash, NOW())
    RETURNING admin_id INTO v_admin_id;

    -- Insert into team_member table
    INSERT INTO public.team_member (
        admin_id, full_name, nip, phone_number, email, position,
        facebook_url, instagram_url, google_scholar_url, detail_url, photo_url,
        created_at, updated_at
    )
    VALUES (
        v_admin_id, p_full_name, p_nip, p_phone_number, p_email, p_position,
        p_facebook_url, p_instagram_url, p_google_scholar_url, p_detail_url, p_photo_url,
        NOW(), NOW()
    );
END;
$$
;

-- Initial Superadmin Account
DO $$
DECLARE
    admin_id_val INTEGER;
BEGIN
    -- Insert into admin table for 'kepala'
    INSERT INTO public.admin (username, password_hash, created_at)
    VALUES ('kepala', '$2y$12$B90FaytyjUf2gItsex43teL31CeVUsRusrsDHbsk4kpCvnRs/yV4u', CURRENT_TIMESTAMP) -- Hashed 'password'
    RETURNING admin_id INTO admin_id_val;

    -- Insert into team_member table for 'Kepala Laboratorium'
    INSERT INTO public.team_member (
        admin_id, full_name, nip, phone_number, email, position,
        facebook_url, instagram_url, google_scholar_url, photo_url, detail_url,
        created_at, updated_at
    )
    VALUES (
        admin_id_val,
        'Kepala Laboratorium Default', -- Full Name
        'KL001',                      -- NIP
        '081234567890',               -- Phone Number
        'kepala@example.com',         -- Email
        'Kepala Laboratorium',        -- Position
        NULL, NULL, NULL,             -- Social URLs
        'default_photo.jpg',          -- Photo URL (placeholder)
        NULL,                         -- Detail URL
        CURRENT_TIMESTAMP, CURRENT_TIMESTAMP
    );
END $$;

--
-- PostgreSQL database dump complete
--

\unrestrict 4u0xbMvspXqypjB2tNfY8hXtFv05ngnqe90VZu3fC2p8qQqfaEWPH39pDeXdT99
