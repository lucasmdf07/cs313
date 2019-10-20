-- Create Notes table: PK note-id, FK USER_id, fk conf_id, FK speaker_id, fk session_id, Notes
-- create user table: pk user_id, user_name
-- create conference table: pk conf_id, month, year
-- create speaker table: pk speaker_id, speaker_name, talk
-- create session table: pk session_id, fk conf_id, session_name
CREATE TABLE Notes (
    note_id VARCHAR(12),
    user_id VARCHAR(12),
    conf_id VARCHAR(12),
    speaker_id VARCHAR(12),
    session_id VARCHAR(12),
    notes VARCHAR(500),
    PRIMARY KEY(note_id),
    FOREIGN KEY 
);