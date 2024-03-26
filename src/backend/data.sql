    -- Associer des personnages aux événements
    INSERT INTO User (pseudo, mail, mdp, guild) VALUES
    ('Vellanos', 'davidbak38@gmail.com', '$2y$10$KpsZXf4RaWksrClxHlEJweaZSiGBvJs4ds6U5qR/XrDa3yj6aT80i','Odd Manner');

    -- Insérer des classes de World of Warcraft
    INSERT INTO Classe (nom, couleur, icone) VALUES
    ('Warrior', 'C79C6E', 'warrior_icon.png'),
    ('Paladin', 'F58CBA', 'paladin_icon.png'),
    ('Hunter', 'ABD473', 'hunter_icon.png'),
    ('Rogue', 'FFF569', 'rogue_icon.png'),
    ('Priest', 'FFFFFF', 'priest_icon.png'),
    ('Death Knight', 'C41F3B', 'deathknight_icon.png'),
    ('Shaman', '0070DE', 'shaman_icon.png'),
    ('Mage', '69CCF0', 'mage_icon.png'),
    ('Warlock', '9482C9', 'warlock_icon.png'),
    ('Monk', '00FF96', 'monk_icon.png'),
    ('Demon Hunter', 'A330C9', 'demonhunter_icon.png'),
    ('Druid', 'FF7D0A', 'druid_icon.png'),  
    ('Evoker', '33937F', 'icone_evoker.png');

    -- Insérer des versions de jeu
    INSERT INTO GameVersion (nom) VALUES
    ('Classic Era'),
    ('Classic Wotlk'),
    ('Retail');

    -- Insérer des raids
    INSERT INTO Raid (nom, gameversion_id, img) VALUES
    ('Molten Core', 1, 'MC.jpg'),
    ('Zul Gurub', 1, 'ZG.png'),
    ('Naxxramas', 1, 'Naxx.jpeg'),
    ('Icecrown Citadel', 2, 'ICC.jpg'),
    ('Ulduar', 2, 'Ulduar.png'),
    ('Naxxramas', 2, 'Naxx.jpeg'),
    ('Vault of the Incarnates', 3, 'Vault.png'),
    ('Aberrus', 3, 'Aberrus.png'),
    ('Amirdrassil', 3, 'Amirdrassil.png');

    -- Insérer des spécialisations
    INSERT INTO Specialisation (role, name, classe_id) VALUES
    ('Tank', 'Protection', 1),
    ('DPS', 'Fury', 1),
    ('DPS', 'Arms', 1),
    ('Tank', 'Protection', 2),
    ('DPS', 'Holy', 2),
    ('DPS', 'Retribution', 2),
    ('DPS', 'Beast Mastery', 3),
    ('DPS', 'Marksmanship', 3),
    ('DPS', 'Survival', 3),
    ('DPS', 'Assassination', 4),
    ('DPS', 'Outlaw', 4),
    ('DPS', 'Subtlety', 4),
    ('Heal', 'Holy', 5),
    ('Heal', 'Shadow', 5),
    ('Tank', 'Blood', 6),
    ('DPS', 'Frost', 6),
    ('DPS', 'Unholy', 6),
    ('Heal', 'Restoration', 7),
    ('DPS', 'Elemental', 7),
    ('DPS', 'Enhancement', 7),
    ('DPS', 'Arcane', 8),
    ('DPS', 'Fire', 8),
    ('DPS', 'Frost', 8),
    ('DPS', 'Affliction', 9),
    ('DPS', 'Demonology', 9),
    ('DPS', 'Destruction', 9),
    ('Tank', 'Brewmaster', 10),
    ('Heal', 'Mistweaver', 10),
    ('DPS', 'Windwalker', 10),
    ('Tank', 'Protection', 11),
    ('DPS', 'Vengeance', 11),
    ('Tank', 'Guardian', 12),
    ('DPS', 'Balance', 12),
    ('DPS', 'Feral', 12),
    ('Heal', 'Preservation', 13),
    ('DPS', 'Augmentation', 13),
    ('DPS', 'Devastation', 13);

    -- Insérer des personnages associés aux utilisateurs
    INSERT INTO Personnage (nom, classe_id, user_id) VALUES
    ('Vellanos', 8, 1),
    ('Valalock', 9, 1);

    -- Insérer des événements liés aux utilisateurs et aux raids
    INSERT INTO EventTable (date, horaire, raid_id, user_id) VALUES
    ('2024-04-01', '20:00:00', 9, 1),
    ('2024-04-05', '21:00:00', 4, 1),
    ('2024-04-25', '20:00:00', 9, 1),
    ('2024-04-15', '21:00:00', 4, 1);

    -- Associer des personnages aux événements
    INSERT INTO EventHasPerso (personnage_id, event_id) VALUES
    (1, 1),
    (2, 2);
