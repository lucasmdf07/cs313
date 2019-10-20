CREATE TABLE EVENT
(
    id SERIAL           NOT NULL PRIMARY KEY
    , name              VARCHAR(200) NOT NULL
    , description       VARCHAR(200) NOT NULL
    , image             VARCHAR(200) NOT NULL
);

CREATE TABLE PARTICIPANT
(
    IDENTITY        SERIAL NOT NULL PRIMARY KEY
    , name          VARCHAR(100) NOT NULL
);

CREATE TABLE EVENT_PARTICIPANT
(
    id              SERIAL  NOT NULL PRIMARY KEY
    , event_id      INT     NOT NULL REFERENCES EVENT (id)
    , participant   INT     NOT NULL REFERENCES EVENT PARTICIPANT(id)
);