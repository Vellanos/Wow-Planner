INSERT INTO Classe (name_class, name_spec, role, couleur, icone) VALUES
('Warrior', 'Arms', 'DPS', 'C79C6E', 'war.png'),
('Warrior', 'Fury', 'DPS', 'C79C6E', 'war.png'),
('Warrior', 'Protection', 'Tank', 'C79C6E', 'war.png'),

('Paladin', 'Holy', 'Heal', 'F58CBA', 'paladin.png'),
('Paladin', 'Protection', 'Tank', 'F58CBA', 'paladin.png'),
('Paladin', 'Retribution', 'DPS', 'F58CBA', 'paladin.png'),

('Hunter', 'Beast Mastery', 'DPS', 'ABD473', 'hunter.png'),
('Hunter', 'Marksmanship', 'DPS', 'ABD473', 'hunter.png'),
('Hunter', 'Survival', 'DPS', 'ABD473', 'hunter.png'),

('Rogue', 'Assassination', 'DPS', 'FFF569', 'rogue.png'),
('Rogue', 'Outlaw', 'DPS', 'FFF569', 'rogue.png'),
('Rogue', 'Subtlety', 'DPS', 'FFF569', 'rogue.png'),

('Priest', 'Discipline', 'Heal', 'FFFFFF', 'priest.png'),
('Priest', 'Holy', 'Heal', 'FFFFFF', 'priest.png'),
('Priest', 'Shadow', 'DPS', 'FFFFFF', 'priest.png'),

('Death Knight', 'Blood', 'Tank', 'C41F3B', 'dk.png'),
('Death Knight', 'Frost', 'DPS', 'C41F3B', 'dk.png'),
('Death Knight', 'Unholy', 'DPS', 'C41F3B', 'dk.png'),

('Shaman', 'Elemental', 'DPS', '0070DE', 'shaman.png'),
('Shaman', 'Enhancement', 'DPS', '0070DE', 'shaman.png'),
('Shaman', 'Restoration', 'Heal', '0070DE', 'shaman.png'),

('Mage', 'Arcane', 'DPS', '69CCF0', 'mage.png'),
('Mage', 'Fire', 'DPS', '69CCF0', 'mage.png'),
('Mage', 'Frost', 'DPS', '69CCF0', 'mage.png'),

('Warlock', 'Affliction', 'DPS', '9482C9', 'warlock.png'),
('Warlock', 'Demonology', 'DPS', '9482C9', 'warlock.png'),
('Warlock', 'Destruction', 'DPS', '9482C9', 'warlock.png'),

('Monk', 'Brewmaster', 'Tank', '00FF96', 'monk.png'),
('Monk', 'Mistweaver', 'Heal', '00FF96', 'monk.png'),
('Monk', 'Windwalker', 'DPS', '00FF96', 'monk.png'),

('Demon Hunter', 'Havoc', 'DPS', 'A330C9', 'dh.png'),
('Demon Hunter', 'Vengeance', 'Tank', 'A330C9', 'dh.png'),

('Druid', 'Balance', 'DPS', 'FF7D0A', 'druid.png'),
('Druid', 'Feral', 'DPS', 'FF7D0A', 'druid.png'),
('Druid', 'Guardian', 'Tank', 'FF7D0A', 'druid.png'),
('Druid', 'Restoration', 'Heal', 'FF7D0A', 'druid.png'),

('Evoker', 'Augmentation', 'DPS', '33937F', 'evoker.png'),
('Evoker', 'Devastation', 'DPS', '33937F', 'evoker.png'),
('Evoker', 'Preservation', 'Heal', '33937F', 'evoker.png');


INSERT INTO GameVersion (nom) VALUES
('Classic Era'),
('Classic Wotlk'),
('Retail');

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