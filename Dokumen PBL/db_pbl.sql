--
-- PostgreSQL database dump
--

\restrict VEWzuoSP74BWlPPLCGPSY23BsoXHIfF4ns6HdjOUjedXPZBzLVDUECgiImwZX2m

-- Dumped from database version 15.14 (Debian 15.14-1.pgdg13+1)
-- Dumped by pg_dump version 18.1

-- Started on 2025-12-15 21:32:53 WIB

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
-- TOC entry 237 (class 1255 OID 17932)
-- Name: sp_create_team_member(character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying); Type: PROCEDURE; Schema: public; Owner: rya
--

CREATE PROCEDURE public.sp_create_team_member(IN p_username character varying, IN p_password_hash character varying, IN p_full_name character varying, IN p_nip character varying, IN p_phone_number character varying, IN p_email character varying, IN p_position character varying, IN p_facebook_url character varying, IN p_instagram_url character varying, IN p_google_scholar_url character varying, IN p_detail_url character varying, IN p_photo_url character varying)
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
$$;


ALTER PROCEDURE public.sp_create_team_member(IN p_username character varying, IN p_password_hash character varying, IN p_full_name character varying, IN p_nip character varying, IN p_phone_number character varying, IN p_email character varying, IN p_position character varying, IN p_facebook_url character varying, IN p_instagram_url character varying, IN p_google_scholar_url character varying, IN p_detail_url character varying, IN p_photo_url character varying) OWNER TO rya;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 214 (class 1259 OID 17797)
-- Name: admin; Type: TABLE; Schema: public; Owner: rya
--

CREATE TABLE public.admin (
    admin_id integer NOT NULL,
    username character varying(100) NOT NULL,
    password_hash character varying(255) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.admin OWNER TO rya;

--
-- TOC entry 215 (class 1259 OID 17801)
-- Name: admin_admin_id_seq; Type: SEQUENCE; Schema: public; Owner: rya
--

CREATE SEQUENCE public.admin_admin_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.admin_admin_id_seq OWNER TO rya;

--
-- TOC entry 3549 (class 0 OID 0)
-- Dependencies: 215
-- Name: admin_admin_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rya
--

ALTER SEQUENCE public.admin_admin_id_seq OWNED BY public.admin.admin_id;


--
-- TOC entry 216 (class 1259 OID 17802)
-- Name: contact_message; Type: TABLE; Schema: public; Owner: rya
--

CREATE TABLE public.contact_message (
    message_id integer NOT NULL,
    full_name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    message_text text NOT NULL,
    is_read boolean DEFAULT false,
    received_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.contact_message OWNER TO rya;

--
-- TOC entry 217 (class 1259 OID 17809)
-- Name: contact_message_message_id_seq; Type: SEQUENCE; Schema: public; Owner: rya
--

CREATE SEQUENCE public.contact_message_message_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.contact_message_message_id_seq OWNER TO rya;

--
-- TOC entry 3550 (class 0 OID 0)
-- Dependencies: 217
-- Name: contact_message_message_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rya
--

ALTER SEQUENCE public.contact_message_message_id_seq OWNED BY public.contact_message.message_id;


--
-- TOC entry 218 (class 1259 OID 17810)
-- Name: gallery_item; Type: TABLE; Schema: public; Owner: rya
--

CREATE TABLE public.gallery_item (
    item_id integer NOT NULL,
    title character varying(255) NOT NULL,
    item_date date,
    image_url character varying(255) NOT NULL,
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.gallery_item OWNER TO rya;

--
-- TOC entry 219 (class 1259 OID 17816)
-- Name: gallery_item_item_id_seq; Type: SEQUENCE; Schema: public; Owner: rya
--

CREATE SEQUENCE public.gallery_item_item_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.gallery_item_item_id_seq OWNER TO rya;

--
-- TOC entry 3551 (class 0 OID 0)
-- Dependencies: 219
-- Name: gallery_item_item_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rya
--

ALTER SEQUENCE public.gallery_item_item_id_seq OWNED BY public.gallery_item.item_id;


--
-- TOC entry 220 (class 1259 OID 17817)
-- Name: guestbook_message; Type: TABLE; Schema: public; Owner: rya
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


ALTER TABLE public.guestbook_message OWNER TO rya;

--
-- TOC entry 221 (class 1259 OID 17824)
-- Name: guestbook_message_message_id_seq; Type: SEQUENCE; Schema: public; Owner: rya
--

CREATE SEQUENCE public.guestbook_message_message_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.guestbook_message_message_id_seq OWNER TO rya;

--
-- TOC entry 3552 (class 0 OID 0)
-- Dependencies: 221
-- Name: guestbook_message_message_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rya
--

ALTER SEQUENCE public.guestbook_message_message_id_seq OWNED BY public.guestbook_message.message_id;


--
-- TOC entry 222 (class 1259 OID 17825)
-- Name: news; Type: TABLE; Schema: public; Owner: rya
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


ALTER TABLE public.news OWNER TO rya;

--
-- TOC entry 223 (class 1259 OID 17832)
-- Name: news_news_id_seq; Type: SEQUENCE; Schema: public; Owner: rya
--

CREATE SEQUENCE public.news_news_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.news_news_id_seq OWNER TO rya;

--
-- TOC entry 3553 (class 0 OID 0)
-- Dependencies: 223
-- Name: news_news_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rya
--

ALTER SEQUENCE public.news_news_id_seq OWNED BY public.news.news_id;


--
-- TOC entry 224 (class 1259 OID 17833)
-- Name: product; Type: TABLE; Schema: public; Owner: rya
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


ALTER TABLE public.product OWNER TO rya;

--
-- TOC entry 225 (class 1259 OID 17841)
-- Name: product_product_id_seq; Type: SEQUENCE; Schema: public; Owner: rya
--

CREATE SEQUENCE public.product_product_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.product_product_id_seq OWNER TO rya;

--
-- TOC entry 3554 (class 0 OID 0)
-- Dependencies: 225
-- Name: product_product_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rya
--

ALTER SEQUENCE public.product_product_id_seq OWNED BY public.product.product_id;


--
-- TOC entry 226 (class 1259 OID 17842)
-- Name: settings; Type: TABLE; Schema: public; Owner: rya
--

CREATE TABLE public.settings (
    id integer NOT NULL,
    setting_key character varying(100) NOT NULL,
    setting_value text,
    updated_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.settings OWNER TO rya;

--
-- TOC entry 227 (class 1259 OID 17848)
-- Name: settings_id_seq; Type: SEQUENCE; Schema: public; Owner: rya
--

CREATE SEQUENCE public.settings_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.settings_id_seq OWNER TO rya;

--
-- TOC entry 3555 (class 0 OID 0)
-- Dependencies: 227
-- Name: settings_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rya
--

ALTER SEQUENCE public.settings_id_seq OWNED BY public.settings.id;


--
-- TOC entry 228 (class 1259 OID 17849)
-- Name: team_member; Type: TABLE; Schema: public; Owner: rya
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


ALTER TABLE public.team_member OWNER TO rya;

--
-- TOC entry 229 (class 1259 OID 17856)
-- Name: team_member_member_id_seq; Type: SEQUENCE; Schema: public; Owner: rya
--

CREATE SEQUENCE public.team_member_member_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.team_member_member_id_seq OWNER TO rya;

--
-- TOC entry 3556 (class 0 OID 0)
-- Dependencies: 229
-- Name: team_member_member_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rya
--

ALTER SEQUENCE public.team_member_member_id_seq OWNED BY public.team_member.member_id;


--
-- TOC entry 230 (class 1259 OID 17857)
-- Name: visitor_log; Type: TABLE; Schema: public; Owner: rya
--

CREATE TABLE public.visitor_log (
    log_id bigint NOT NULL,
    ip_address inet NOT NULL,
    user_agent text,
    visit_timestamp timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.visitor_log OWNER TO rya;

--
-- TOC entry 231 (class 1259 OID 17863)
-- Name: v_visitor_stats; Type: VIEW; Schema: public; Owner: rya
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


ALTER VIEW public.v_visitor_stats OWNER TO rya;

--
-- TOC entry 232 (class 1259 OID 17867)
-- Name: v_dashboard_summary; Type: VIEW; Schema: public; Owner: rya
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


ALTER VIEW public.v_dashboard_summary OWNER TO rya;

--
-- TOC entry 233 (class 1259 OID 17871)
-- Name: v_new_messages_count; Type: VIEW; Schema: public; Owner: rya
--

CREATE VIEW public.v_new_messages_count AS
 SELECT (( SELECT count(*) AS count
           FROM public.contact_message
          WHERE (contact_message.is_read = false)) + ( SELECT count(*) AS count
           FROM public.guestbook_message
          WHERE (guestbook_message.is_read = false))) AS new_message_count;


ALTER VIEW public.v_new_messages_count OWNER TO rya;

--
-- TOC entry 234 (class 1259 OID 17875)
-- Name: v_recent_news; Type: VIEW; Schema: public; Owner: rya
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


ALTER VIEW public.v_recent_news OWNER TO rya;

--
-- TOC entry 235 (class 1259 OID 17880)
-- Name: v_recent_products; Type: VIEW; Schema: public; Owner: rya
--

CREATE VIEW public.v_recent_products AS
 SELECT product.product_id,
    product.product_name
   FROM public.product
  ORDER BY product.created_at DESC
 LIMIT 5;


ALTER VIEW public.v_recent_products OWNER TO rya;

--
-- TOC entry 236 (class 1259 OID 17884)
-- Name: visitor_log_log_id_seq; Type: SEQUENCE; Schema: public; Owner: rya
--

CREATE SEQUENCE public.visitor_log_log_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.visitor_log_log_id_seq OWNER TO rya;

--
-- TOC entry 3557 (class 0 OID 0)
-- Dependencies: 236
-- Name: visitor_log_log_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rya
--

ALTER SEQUENCE public.visitor_log_log_id_seq OWNED BY public.visitor_log.log_id;


--
-- TOC entry 3324 (class 2604 OID 17885)
-- Name: admin admin_id; Type: DEFAULT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.admin ALTER COLUMN admin_id SET DEFAULT nextval('public.admin_admin_id_seq'::regclass);


--
-- TOC entry 3326 (class 2604 OID 17886)
-- Name: contact_message message_id; Type: DEFAULT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.contact_message ALTER COLUMN message_id SET DEFAULT nextval('public.contact_message_message_id_seq'::regclass);


--
-- TOC entry 3329 (class 2604 OID 17887)
-- Name: gallery_item item_id; Type: DEFAULT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.gallery_item ALTER COLUMN item_id SET DEFAULT nextval('public.gallery_item_item_id_seq'::regclass);


--
-- TOC entry 3331 (class 2604 OID 17888)
-- Name: guestbook_message message_id; Type: DEFAULT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.guestbook_message ALTER COLUMN message_id SET DEFAULT nextval('public.guestbook_message_message_id_seq'::regclass);


--
-- TOC entry 3334 (class 2604 OID 17889)
-- Name: news news_id; Type: DEFAULT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.news ALTER COLUMN news_id SET DEFAULT nextval('public.news_news_id_seq'::regclass);


--
-- TOC entry 3337 (class 2604 OID 17890)
-- Name: product product_id; Type: DEFAULT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.product ALTER COLUMN product_id SET DEFAULT nextval('public.product_product_id_seq'::regclass);


--
-- TOC entry 3341 (class 2604 OID 17891)
-- Name: settings id; Type: DEFAULT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.settings ALTER COLUMN id SET DEFAULT nextval('public.settings_id_seq'::regclass);


--
-- TOC entry 3343 (class 2604 OID 17892)
-- Name: team_member member_id; Type: DEFAULT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.team_member ALTER COLUMN member_id SET DEFAULT nextval('public.team_member_member_id_seq'::regclass);


--
-- TOC entry 3346 (class 2604 OID 17893)
-- Name: visitor_log log_id; Type: DEFAULT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.visitor_log ALTER COLUMN log_id SET DEFAULT nextval('public.visitor_log_log_id_seq'::regclass);


--
-- TOC entry 3526 (class 0 OID 17797)
-- Dependencies: 214
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: rya
--

INSERT INTO public.admin VALUES (1, 'kepala', '$2y$12$B90FaytyjUf2gItsex43teL31CeVUsRusrsDHbsk4kpCvnRs/yV4u', '2025-12-14 03:16:57.284445+00');
INSERT INTO public.admin VALUES (3, 'anggota2', '$2y$12$OeEn9PCzzr5PDQb7Zz04R.vlFT7tc734cltKb3tVzyjbsP.a.OUFu', '2025-12-14 04:37:13.884522+00');
INSERT INTO public.admin VALUES (4, 'anggota3', '$2y$12$hdjJ1vhVYcnYWbTssEtrHOSkXjGHPSrQL.Qu6SkV8EPn0q1V4g1Ba', '2025-12-14 04:42:04.127369+00');
INSERT INTO public.admin VALUES (5, 'Rya', '$2y$12$qE8egHF7qbs1MlT3.bKV4OVJEqe/4F0l3MS1ERmSWBsp/C2jmA3nW', '2025-12-14 04:46:47.158782+00');
INSERT INTO public.admin VALUES (2, 'anggota', '$2y$12$WpvTwd/vrTPH/f.fRXwCxOFNjiwZnCXEotZbwcM.AFRxkRwtzt9ly', '2025-12-14 03:44:32.731659+00');


--
-- TOC entry 3528 (class 0 OID 17802)
-- Dependencies: 216
-- Data for Name: contact_message; Type: TABLE DATA; Schema: public; Owner: rya
--

INSERT INTO public.contact_message VALUES (1, 'Brandon', 'brand@email.com', 'min aku mau join', true, '2025-12-14 05:06:56.124153+00');
INSERT INTO public.contact_message VALUES (2, 'Rya', '244107020028@student.polinema.ac.id', 'tes', true, '2025-12-15 14:06:10.102195+00');


--
-- TOC entry 3530 (class 0 OID 17810)
-- Dependencies: 218
-- Data for Name: gallery_item; Type: TABLE DATA; Schema: public; Owner: rya
--

INSERT INTO public.gallery_item VALUES (1, 'Foto 1', '2025-12-14', '27_gallery1.png', '2025-12-14 03:57:35.554347+00');
INSERT INTO public.gallery_item VALUES (2, 'Foto 2', '2025-12-14', '51_gallery2.png', '2025-12-14 03:57:46.541324+00');
INSERT INTO public.gallery_item VALUES (3, 'Foto 3', '2025-12-14', '51_gallery3.png', '2025-12-14 03:58:07.499915+00');
INSERT INTO public.gallery_item VALUES (4, 'Foto 4', '2025-12-14', '91_gallery4.png', '2025-12-14 03:58:18.826467+00');
INSERT INTO public.gallery_item VALUES (5, 'Foto 5', '2025-12-14', '87_gallery5.png', '2025-12-14 03:58:29.732945+00');
INSERT INTO public.gallery_item VALUES (6, 'Foto 6', '2025-12-14', '55_gallery6.png', '2025-12-14 03:58:40.422047+00');
INSERT INTO public.gallery_item VALUES (7, 'Foto 7', '2025-12-14', '16_gallery7.png', '2025-12-14 03:58:56.394788+00');
INSERT INTO public.gallery_item VALUES (8, 'Foto 8', '2025-12-14', '9_gallery8.png', '2025-12-14 03:59:06.681381+00');
INSERT INTO public.gallery_item VALUES (9, 'Foto 9', '2025-12-14', '38_gallery9.png', '2025-12-14 03:59:17.483106+00');
INSERT INTO public.gallery_item VALUES (10, 'Foto 10', '2025-12-14', '99_gallery10.png', '2025-12-14 03:59:36.747272+00');
INSERT INTO public.gallery_item VALUES (11, 'Foto 11', '2025-12-14', '92_gallery11.png', '2025-12-14 03:59:47.80148+00');
INSERT INTO public.gallery_item VALUES (12, 'Foto 12', '2025-12-14', '38_gallery12.png', '2025-12-14 03:59:57.842041+00');
INSERT INTO public.gallery_item VALUES (13, 'Foto 13', '2025-12-14', '56_gallery13.png', '2025-12-14 04:00:06.914614+00');
INSERT INTO public.gallery_item VALUES (14, 'Foto 14', '2025-12-14', '86_gallery14.png', '2025-12-14 04:00:15.238309+00');
INSERT INTO public.gallery_item VALUES (15, 'Foto 15', '2025-12-14', '34_produk1.png', '2025-12-14 04:10:57.684898+00');
INSERT INTO public.gallery_item VALUES (16, 'Foto 16', '2025-12-14', '87_produk3.png', '2025-12-14 04:11:14.158087+00');
INSERT INTO public.gallery_item VALUES (17, 'Foto 17', '2025-12-14', '25_produk2.png', '2025-12-14 04:11:33.879694+00');


--
-- TOC entry 3532 (class 0 OID 17817)
-- Dependencies: 220
-- Data for Name: guestbook_message; Type: TABLE DATA; Schema: public; Owner: rya
--

INSERT INTO public.guestbook_message VALUES (1, 'Ariel', 'ariel@email.com', 'ITS', '088833334444', 'Keren labnya', true, '2025-12-14 05:05:59.608083+00');


--
-- TOC entry 3534 (class 0 OID 17825)
-- Dependencies: 222
-- Data for Name: news; Type: TABLE DATA; Schema: public; Owner: rya
--

INSERT INTO public.news VALUES (1, 'ICCE 2023, Full Paper Presentation', '<p>Kegiatan pemaparan makalah di ICCE 2023 di Matsue, Jepang merupakan 
ajang ilmiah internasional yang mempertemukan peneliti, pengajar, dan 
mahasiswa untuk mempresentasikan hasil penelitian di bidang teknologi

pendidikan. Peserta yang lolos seleksi menyampaikan temuan mereka di 
hadapan para ahli, disertai sesi tanya jawab untuk memperoleh masukan. 
Melalui kegiatan ini, peneliti dapat memperkenalkan karya mereka secara 
global, membangun kolaborasi, dan meningkatkan kualitas penelitian di 
masa depan.</p>', '5_gallery7.png', 1, '2024-12-14', '2025-12-14 03:36:04.677965+00', '2025-12-14 03:36:04.677965+00');
INSERT INTO public.news VALUES (2, 'ICAST 2024 Bandung', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus fermentum lobortis neque, nec feugiat lorem luctus ac. Donec faucibus laoreet finibus. Phasellus fringilla nunc in lobortis euismod. Cras fermentum tellus vitae rhoncus dictum. Nam egestas est nec diam elementum finibus. Maecenas id lacinia arcu. Aliquam suscipit eleifend massa eget feugiat. Nam aliquam vitae augue vitae viverra. Vestibulum nec sem et orci mollis tincidunt. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&nbsp;</p><p>Fusce sit amet augue eget metus lacinia vehicula. Vestibulum pharetra mollis ligula, nec consectetur lacus. Duis vulputate arcu non malesuada malesuada. Fusce vestibulum lobortis laoreet. Vivamus et eros lorem. Maecenas id tincidunt magna. Fusce in scelerisque elit. Donec eu rhoncus quam, vitae consequat arcu. Suspendisse a lorem eget lacus viverra consequat ut ut arcu. Morbi quis lacus quis massa tempus dictum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Ut blandit efficitur sem at dapibus. Pellentesque massa velit, vulputate id euismod ut, rhoncus vitae nibh. Sed orci ex, imperdiet id magna quis, tincidunt luctus odio.&nbsp;</p>', '99_gallery3.png', 2, '2025-07-14', '2025-12-14 03:47:36.956926+00', '2025-12-14 03:47:36.956926+00');
INSERT INTO public.news VALUES (3, 'ICCE 2024 Atteneo University', '<p>
Nulla lectus quam, suscipit sed eleifend sed, ultrices non tortor. Cras 
vel libero sem. Nunc nec nulla nec nunc lobortis auctor. Quisque 
euismod, erat in molestie volutpat, elit nisl blandit nunc, a porta orci
 massa eget est. Duis ullamcorper sodales justo, nec tristique nisi 
vestibulum luctus. Nam commodo volutpat erat, at placerat leo feugiat 
id. Sed consequat purus felis, vel ultrices velit convallis vitae. Morbi
 diam purus, ullamcorper sit amet vestibulum eu, ullamcorper quis purus.
</p>
<p>
Aliquam ornare sollicitudin dolor ac sagittis. Donec metus velit, 
interdum sed vulputate ut, scelerisque vitae felis. Nunc dui ex, 
convallis eget elementum et, pulvinar id ex. Nullam quis ullamcorper 
dolor. Vivamus vel arcu sed diam bibendum porttitor. Nam tincidunt ex et
 justo porttitor venenatis. Mauris rutrum sapien sed justo vehicula 
pharetra ac vel nibh. Curabitur ut placerat ante. Aenean in massa 
scelerisque, dignissim turpis vitae, vestibulum neque. In iaculis augue 
ut ipsum egestas faucibus. Phasellus nisl nisl, congue id massa quis, 
rhoncus mollis lorem. Nulla quis ante mi. Pellentesque hendrerit eget 
massa tincidunt facilisis.
</p><p><br></p>', '96_gallery2.png', 1, '2024-11-06', '2025-12-14 03:52:15.111606+00', '2025-12-14 03:52:15.111606+00');
INSERT INTO public.news VALUES (4, 'POLINEMA Research EXPO 2024', '<p>
Aliquam ornare sollicitudin dolor ac sagittis. Donec metus velit, 
interdum sed vulputate ut, scelerisque vitae felis. Nunc dui ex, 
convallis eget elementum et, pulvinar id ex. Nullam quis ullamcorper 
dolor. Vivamus vel arcu sed diam bibendum porttitor. Nam tincidunt ex et
 justo porttitor venenatis. Mauris rutrum sapien sed justo vehicula 
pharetra ac vel nibh. Curabitur ut placerat ante. Aenean in massa 
scelerisque, dignissim turpis vitae, vestibulum neque. In iaculis augue 
ut ipsum egestas faucibus. Phasellus nisl nisl, congue id massa quis, 
rhoncus mollis lorem. Nulla quis ante mi. Pellentesque hendrerit eget 
massa tincidunt facilisis.
</p>
<p>
Vestibulum mollis sit amet enim sed varius. Etiam suscipit vitae turpis 
gravida ornare. Ut scelerisque lacinia vestibulum. Duis nunc sem, 
tincidunt et suscipit id, vulputate ac sem. Pellentesque pharetra 
scelerisque molestie. Duis pharetra egestas orci, convallis ullamcorper 
nisi egestas nec. Aliquam elementum, nisl nec vulputate efficitur, erat 
nunc vulputate nisi, eget consequat mauris velit ac dolor. Morbi 
ultrices tellus non odio iaculis posuere. Orci varius natoque penatibus 
et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque 
vehicula metus eu neque commodo, sed egestas nulla ornare. Fusce neque 
nulla, semper ac euismod ut, varius nec velit. Ut tincidunt at massa ut 
ornare. Quisque aliquet odio nec nulla dapibus, vitae dignissim metus 
tristique.
</p><p><br></p>', '40_gallery4.png', 2, '2024-12-03', '2025-12-14 04:17:02.473446+00', '2025-12-14 04:17:02.473446+00');
INSERT INTO public.news VALUES (5, 'ECTEL 2024 Krems', '<p>
Vestibulum egestas finibus nunc ac consectetur. Cras vel tristique sem, 
eu auctor arcu. Aliquam ornare metus vitae commodo sollicitudin. Orci 
varius natoque penatibus et magnis dis parturient montes, nascetur 
ridiculus mus. Pellentesque aliquet libero sed mattis sollicitudin. Ut 
ipsum eros, pellentesque vel iaculis vel, rutrum vitae lectus. Ut 
feugiat lectus risus, a vestibulum massa pellentesque at. Maecenas 
cursus magna ac magna imperdiet, ut posuere ipsum imperdiet. Cras non 
justo ac neque iaculis mollis vel at purus. Nulla vestibulum lorem et 
blandit aliquet. Nullam ultricies malesuada sapien. Donec dui sem, 
aliquam dictum molestie vel, luctus malesuada ligula. Aenean viverra, 
dolor id ultricies ornare, magna justo porttitor lectus, non aliquet 
metus ante quis metus.
</p>
<p>
Cras faucibus sapien eu lorem molestie feugiat. Maecenas et diam 
facilisis, sollicitudin risus eget, condimentum erat. Etiam eget laoreet
 lacus. Sed volutpat lectus sit amet lacus finibus, sed mattis justo 
hendrerit. Vestibulum vel porttitor turpis, nec egestas tellus. Nullam 
eu urna eget lorem viverra consectetur. Praesent hendrerit dui at tempor
 maximus. Donec ultrices erat nulla, eget dignissim nisl porttitor vel. 
Integer quis ultrices turpis, vulputate maximus nisl. Proin vel risus 
suscipit, efficitur magna ut, convallis justo. Donec cursus eleifend 
pretium. Vivamus ut commodo mauris. Sed semper mi vitae dolor suscipit, 
porttitor accumsan diam gravida. Vestibulum gravida purus posuere 
lacinia pretium. Proin euismod lacus et porttitor commodo.
</p><p><br></p>', '39_gallery1.png', 4, '2024-11-06', '2025-12-14 04:53:05.350801+00', '2025-12-14 04:53:05.350801+00');
INSERT INTO public.news VALUES (6, 'International Research Discussion Program', '<p>Kolaborasi riset internasional di bidang teknologi pembelajaran digital dan pengembangan sistem cerdas berbasis AI.</p>', '1_gallery10.png', 3, '2025-06-11', '2025-12-14 04:54:20.855422+00', '2025-12-14 04:54:20.855422+00');
INSERT INTO public.news VALUES (7, 'Monthly Research Discussion', '<p>Forum diskusi rutin yang membahas progres penelitian,tantangan teknis, dan rencana publikasi dari tim InLET.</p>', '60_gallery9.png', 4, '2025-09-15', '2025-12-14 04:55:29.925287+00', '2025-12-14 04:55:29.925287+00');
INSERT INTO public.news VALUES (8, 'ICCE 2024, Full Paper Presentation', '<p></p>
<p>
Cras faucibus sapien eu lorem molestie feugiat. Maecenas et diam 
facilisis, sollicitudin risus eget, condimentum erat. Etiam eget laoreet
 lacus. Sed volutpat lectus sit amet lacus finibus, sed mattis justo 
hendrerit. Vestibulum vel porttitor turpis, nec egestas tellus. Nullam 
eu urna eget lorem viverra consectetur. Praesent hendrerit dui at tempor
 maximus. Donec ultrices erat nulla, eget dignissim nisl porttitor vel. 
Integer quis ultrices turpis, vulputate maximus nisl. Proin vel risus 
suscipit, efficitur magna ut, convallis justo. Donec cursus eleifend 
pretium. Vivamus ut commodo mauris. Sed semper mi vitae dolor suscipit, 
porttitor accumsan diam gravida. Vestibulum gravida purus posuere 
lacinia pretium. Proin euismod lacus et porttitor commodo.
</p>
<p>
Integer aliquam pretium maximus. Pellentesque sollicitudin, lacus quis 
rutrum sagittis, augue neque vehicula sem, lobortis varius purus dolor 
pharetra lacus. Curabitur pretium, urna ac posuere tristique, nibh metus
 dignissim augue, id viverra urna velit nec risus. Aenean et augue vel 
urna placerat pellentesque. Cras suscipit accumsan libero, id maximus 
felis tincidunt vel. Duis arcu neque, luctus quis suscipit sed, euismod 
sit amet dolor. Nunc suscipit quis risus eget ullamcorper. Curabitur sit
 amet augue scelerisque, scelerisque turpis sit amet, scelerisque 
tortor. Maecenas sit amet lorem vitae dui hendrerit dictum. Donec 
egestas mauris nec enim egestas facilisis vitae eu massa. Aliquam erat 
volutpat. Maecenas laoreet turpis pellentesque pretium egestas.
</p>
<p>
Morbi in fermentum ante. Maecenas non metus eleifend, luctus libero eu, 
rhoncus est. Sed vel aliquam nisi. Sed sem tortor, pulvinar vel sagittis
 quis, consectetur nec elit. Sed sit amet ornare quam. Aliquam erat 
volutpat. Vestibulum nec libero pellentesque, egestas urna posuere, 
sagittis tellus. Duis accumsan at dolor et tempus. Cras luctus ante sed 
eros porta malesuada. Integer dapibus odio sed ligula aliquam 
sollicitudin. Integer non sagittis magna. Sed dui turpis, consequat ut 
augue non, tristique aliquet turpis. Aliquam ut laoreet nisl. 
Pellentesque condimentum nec augue quis ultricies. Nunc nibh nisi, porta
 vel tellus vel, aliquam porttitor nunc.
</p><p><br></p>', '10_gallery6.png', 1, '2024-11-21', '2025-12-14 04:56:57.880781+00', '2025-12-14 04:56:57.880781+00');
INSERT INTO public.news VALUES (9, 'Best Overall Paper Award', '<p>
Morbi in fermentum ante. Maecenas non metus eleifend, luctus libero eu, 
rhoncus est. Sed vel aliquam nisi. Sed sem tortor, pulvinar vel sagittis
 quis, consectetur nec elit. Sed sit amet ornare quam. Aliquam erat 
volutpat. Vestibulum nec libero pellentesque, egestas urna posuere, 
sagittis tellus. Duis accumsan at dolor et tempus. Cras luctus ante sed 
eros porta malesuada. Integer dapibus odio sed ligula aliquam 
sollicitudin. Integer non sagittis magna. Sed dui turpis, consequat ut 
augue non, tristique aliquet turpis. Aliquam ut laoreet nisl. 
Pellentesque condimentum nec augue quis ultricies. Nunc nibh nisi, porta
 vel tellus vel, aliquam porttitor nunc.
</p>
<p>
Nam ut semper ante, id feugiat lorem. Ut dignissim ligula ut sapien 
vestibulum, vel malesuada felis lobortis. Sed elit augue, sagittis vel 
sem non, consequat dictum purus. Phasellus risus risus, commodo quis 
lorem ut, molestie bibendum nisi. Proin sit amet elit est. Quisque at 
dictum diam, molestie vehicula orci. Nullam quis ligula pulvinar leo 
bibendum dapibus. Donec mollis imperdiet dignissim. Class aptent taciti 
sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. 
Nunc eu orci iaculis, viverra risus sed, feugiat elit.
</p>
<p>
Aliquam erat volutpat. Nam pellentesque elit non tempus iaculis. Sed 
quis augue quis ex pulvinar blandit sit amet maximus neque. Fusce 
eleifend nibh urna. In ornare et dui id fringilla. Ut vitae libero nisl.
 Nulla facilisi.
</p>
<p>
Cras efficitur nisi at erat euismod, quis finibus sapien lobortis. Etiam
 tincidunt ultrices eros, a feugiat est efficitur at. Duis at ante ac ex
 molestie pretium ut sed nisl. Proin mollis ornare maximus. Praesent in 
justo et nisl ultricies pulvinar in in massa. Quisque tristique interdum
 finibus. Donec in justo tortor. Nulla ultricies dapibus dolor non 
luctus.
</p><p><br></p>', '13_gallery5.png', 4, '2024-02-24', '2025-12-14 05:02:05.971867+00', '2025-12-14 05:02:05.971867+00');
INSERT INTO public.news VALUES (10, 'Visiting Scientist Program', '<p>Program kunjungan ilmiah untuk berbagi pengalaman, diskusi,dan membuka peluang kerja sama penelitian jangka panjang.</p><p><br><br></p><p><br></p>', '85_gallery8.png', 5, '2025-04-08', '2025-12-14 05:02:50.588892+00', '2025-12-14 05:02:50.588892+00');


--
-- TOC entry 3536 (class 0 OID 17833)
-- Dependencies: 224
-- Data for Name: product; Type: TABLE DATA; Schema: public; Owner: rya
--

INSERT INTO public.product VALUES (1, 'Codeasy', 'Codeasy adalah platform belajar Data Science berbasis Machine Learning yang membantu kamu menguasai Python dan Business Intelligence melalui sistem penilaian otomatis dan analisis kognitif cerdas berbasis Taksonomi Bloom', 'https://codeasy.com/', '85_prodct3.png', '{"Python Modules","Business Intelligence","Machine Learning Based","Bloom Taxonomy Assessment"}', '2025-12-14 03:33:00.417981+00', '2025-12-14 03:33:00.417981+00');
INSERT INTO public.product VALUES (2, 'PseudoLearn Application', 'Sebuah media pembelajaran rekonstruksi algoritma pseudocode dengan menggunakan pendekatan Element Fill-in-Blank Problems di dalam pemrograman java.', 'https://www.pseudolearn.com/', '80_prodct1.png', '{"Algorithm Learning","Pseudocode Reconstruction","Java Programming","Gamified Learning"}', '2025-12-14 05:09:55.199851+00', '2025-12-14 05:09:55.199851+00');
INSERT INTO public.product VALUES (3, 'Viat Map ', 'VIAT-map (Visual Arguments Toulmin) Application to help Reding Comprehension by using Toulmin Arguments Concept. We are trying to emphasise the logic behind a written text by adding the claim, ground and warrant following the Toulmin Argument Concept.', 'https://vmap.let.polinema.ac.id/', '6_prodct2.png', '{"Reading Comprehension Support","Data Visualization","Visual Argument Mapping","Toulmin Model Integration"}', '2025-12-14 05:11:15.576321+00', '2025-12-14 05:11:15.576321+00');


--
-- TOC entry 3538 (class 0 OID 17842)
-- Dependencies: 226
-- Data for Name: settings; Type: TABLE DATA; Schema: public; Owner: rya
--

INSERT INTO public.settings VALUES (1, 'vision', 'Menjadi laboratorium unggulan yang menghasilkan solusi Sistem Informasi terapan untuk kebutuhan pendidikan, bisnis, dan industri.', '2025-12-14 03:41:42.834798');
INSERT INTO public.settings VALUES (2, 'mission', '<ol><li>Mendukung praktikum &amp; pengembangan aplikasi SI (web, mobile, enterprise)</li><li>Melakukan riset terapan di basis data, proses bisnis, analitik data, dan integrasi SI</li><li>Berkolaborasi dengan industri/lembaga untuk proyek SI dan layanan konsultasi</li><li>Selaras dengan mandat pendidikan terapan Polinema &amp; kurikulum prodi TI</li></ol><p><br></p>', '2025-12-14 03:41:42.834798');
INSERT INTO public.settings VALUES (3, 'address', 'Jl. Soekarno Hatta No.9, Mojolangu, Kec. Lowokwaru, Jawa Timur 65141', '2025-12-14 03:41:42.834798');
INSERT INTO public.settings VALUES (4, 'phone', '0 (800) 012 34 56', '2025-12-14 03:41:42.834798');
INSERT INTO public.settings VALUES (5, 'email', 'inLET@polinema.ac.id', '2025-12-14 03:41:42.834798');
INSERT INTO public.settings VALUES (6, 'youtube', 'https://www.youtube.com/@bannisatriaandoko2404', '2025-12-14 03:41:42.834798');


--
-- TOC entry 3540 (class 0 OID 17849)
-- Dependencies: 228
-- Data for Name: team_member; Type: TABLE DATA; Schema: public; Owner: rya
--

INSERT INTO public.team_member VALUES (1, 1, 'Dr. Eng. Banni Satria Andoko, S. Kom., M.MSI.', '198108092010121002', '081234567890', 'ando@polinema.ac.id', '', '', 'https://scholar.google.com/citations?user=jetyPtUAAAAJ&hl=en', '39_Banni.jpeg', 'Kepala Laboratorium', 'https://jti.polinema.ac.id/dr-eng-banni-satria-andoko-s-kom-m-msi/', '2025-12-14 03:16:57.284445+00', '2025-12-14 03:39:12.499734+00');
INSERT INTO public.team_member VALUES (3, 3, 'Budi Harijanto, ST., M.MKom.', '196201051990031002', '-', 'budi.hijet@gmail.com', '', '', 'https://scholar.google.com/citations?user=ysWaNAsAAAAJ&hl=en', '87_budi.png', 'Anggota', 'https://jti.polinema.ac.id/budi-harijanto-st-m-mkom/', '2025-12-14 04:37:13.884522+00', '2025-12-14 04:37:13.884522+00');
INSERT INTO public.team_member VALUES (4, 4, 'Usman Nurhasan, S.Kom., MT.', '198609232015041001', '-', 'usmannurhasan@polinema.ac.id', '', '', 'https://scholar.google.com/citations?user=PEaROTMAAAAJ&hl=id', '6_usman.png', 'Anggota', 'https://jti.polinema.ac.id/usman-nurhasan-s-kom-mt/', '2025-12-14 04:42:04.127369+00', '2025-12-14 04:42:04.127369+00');
INSERT INTO public.team_member VALUES (5, 5, 'Agung Nugroho Pramudhita, S.T., M.T.', '198902102019031020', '-', 'agung.pramudhita@polinema.ac.id', '', '', 'https://scholar.google.com/citations?hl=id&user=hpVrzLoAAAAJ&view_op=list_works', '45_agung.jpeg', 'Anggota', 'https://jti.polinema.ac.id/agung-nugroho-pramudhita-s-t-m-t/', '2025-12-14 04:46:47.158782+00', '2025-12-14 04:46:47.158782+00');
INSERT INTO public.team_member VALUES (2, 2, 'Vivin Ayu Lestari, S.Pd., M.Kom.', '199106212019032020', '-', 'vivin@polinema.ac.id', '', '', 'https://scholar.google.com/citations?user=2og3UP8AAAAJ&hl=en', '65_vivin.jpeg', 'Anggota', 'https://jti.polinema.ac.id/vivin-ayu-lestari-s-pd-m-kom/', '2025-12-14 03:44:32.731659+00', '2025-12-15 14:30:02.80116+00');


--
-- TOC entry 3542 (class 0 OID 17857)
-- Dependencies: 230
-- Data for Name: visitor_log; Type: TABLE DATA; Schema: public; Owner: rya
--



--
-- TOC entry 3558 (class 0 OID 0)
-- Dependencies: 215
-- Name: admin_admin_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rya
--

SELECT pg_catalog.setval('public.admin_admin_id_seq', 5, true);


--
-- TOC entry 3559 (class 0 OID 0)
-- Dependencies: 217
-- Name: contact_message_message_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rya
--

SELECT pg_catalog.setval('public.contact_message_message_id_seq', 2, true);


--
-- TOC entry 3560 (class 0 OID 0)
-- Dependencies: 219
-- Name: gallery_item_item_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rya
--

SELECT pg_catalog.setval('public.gallery_item_item_id_seq', 17, true);


--
-- TOC entry 3561 (class 0 OID 0)
-- Dependencies: 221
-- Name: guestbook_message_message_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rya
--

SELECT pg_catalog.setval('public.guestbook_message_message_id_seq', 1, true);


--
-- TOC entry 3562 (class 0 OID 0)
-- Dependencies: 223
-- Name: news_news_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rya
--

SELECT pg_catalog.setval('public.news_news_id_seq', 10, true);


--
-- TOC entry 3563 (class 0 OID 0)
-- Dependencies: 225
-- Name: product_product_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rya
--

SELECT pg_catalog.setval('public.product_product_id_seq', 3, true);


--
-- TOC entry 3564 (class 0 OID 0)
-- Dependencies: 227
-- Name: settings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rya
--

SELECT pg_catalog.setval('public.settings_id_seq', 6, true);


--
-- TOC entry 3565 (class 0 OID 0)
-- Dependencies: 229
-- Name: team_member_member_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rya
--

SELECT pg_catalog.setval('public.team_member_member_id_seq', 5, true);


--
-- TOC entry 3566 (class 0 OID 0)
-- Dependencies: 236
-- Name: visitor_log_log_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rya
--

SELECT pg_catalog.setval('public.visitor_log_log_id_seq', 1, false);


--
-- TOC entry 3349 (class 2606 OID 17895)
-- Name: admin admin_pkey; Type: CONSTRAINT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_pkey PRIMARY KEY (admin_id);


--
-- TOC entry 3351 (class 2606 OID 17897)
-- Name: admin admin_username_key; Type: CONSTRAINT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_username_key UNIQUE (username);


--
-- TOC entry 3353 (class 2606 OID 17899)
-- Name: contact_message contact_message_pkey; Type: CONSTRAINT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.contact_message
    ADD CONSTRAINT contact_message_pkey PRIMARY KEY (message_id);


--
-- TOC entry 3355 (class 2606 OID 17901)
-- Name: gallery_item gallery_item_pkey; Type: CONSTRAINT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.gallery_item
    ADD CONSTRAINT gallery_item_pkey PRIMARY KEY (item_id);


--
-- TOC entry 3357 (class 2606 OID 17903)
-- Name: guestbook_message guestbook_message_pkey; Type: CONSTRAINT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.guestbook_message
    ADD CONSTRAINT guestbook_message_pkey PRIMARY KEY (message_id);


--
-- TOC entry 3359 (class 2606 OID 17905)
-- Name: news news_pkey; Type: CONSTRAINT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.news
    ADD CONSTRAINT news_pkey PRIMARY KEY (news_id);


--
-- TOC entry 3361 (class 2606 OID 17907)
-- Name: product product_pkey; Type: CONSTRAINT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.product
    ADD CONSTRAINT product_pkey PRIMARY KEY (product_id);


--
-- TOC entry 3363 (class 2606 OID 17909)
-- Name: settings settings_pkey; Type: CONSTRAINT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.settings
    ADD CONSTRAINT settings_pkey PRIMARY KEY (id);


--
-- TOC entry 3365 (class 2606 OID 17911)
-- Name: settings settings_setting_key_key; Type: CONSTRAINT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.settings
    ADD CONSTRAINT settings_setting_key_key UNIQUE (setting_key);


--
-- TOC entry 3367 (class 2606 OID 17913)
-- Name: team_member team_member_admin_id_key; Type: CONSTRAINT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.team_member
    ADD CONSTRAINT team_member_admin_id_key UNIQUE (admin_id);


--
-- TOC entry 3369 (class 2606 OID 17915)
-- Name: team_member team_member_email_key; Type: CONSTRAINT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.team_member
    ADD CONSTRAINT team_member_email_key UNIQUE (email);


--
-- TOC entry 3371 (class 2606 OID 17917)
-- Name: team_member team_member_nip_key; Type: CONSTRAINT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.team_member
    ADD CONSTRAINT team_member_nip_key UNIQUE (nip);


--
-- TOC entry 3373 (class 2606 OID 17919)
-- Name: team_member team_member_pkey; Type: CONSTRAINT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.team_member
    ADD CONSTRAINT team_member_pkey PRIMARY KEY (member_id);


--
-- TOC entry 3375 (class 2606 OID 17921)
-- Name: visitor_log visitor_log_pkey; Type: CONSTRAINT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.visitor_log
    ADD CONSTRAINT visitor_log_pkey PRIMARY KEY (log_id);


--
-- TOC entry 3377 (class 2606 OID 17922)
-- Name: team_member fk_admin; Type: FK CONSTRAINT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.team_member
    ADD CONSTRAINT fk_admin FOREIGN KEY (admin_id) REFERENCES public.admin(admin_id) ON DELETE SET NULL;


--
-- TOC entry 3376 (class 2606 OID 17927)
-- Name: news fk_author; Type: FK CONSTRAINT; Schema: public; Owner: rya
--

ALTER TABLE ONLY public.news
    ADD CONSTRAINT fk_author FOREIGN KEY (author_id) REFERENCES public.team_member(member_id) ON DELETE SET NULL;


--
-- TOC entry 3525 (class 0 OID 17797)
-- Dependencies: 214
-- Name: admin; Type: ROW SECURITY; Schema: public; Owner: rya
--

ALTER TABLE public.admin ENABLE ROW LEVEL SECURITY;

-- Completed on 2025-12-15 21:32:54 WIB

--
-- PostgreSQL database dump complete
--

\unrestrict VEWzuoSP74BWlPPLCGPSY23BsoXHIfF4ns6HdjOUjedXPZBzLVDUECgiImwZX2m

