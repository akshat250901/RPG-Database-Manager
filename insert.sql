INSERT
INTO Village(name, region, population, minLevel)
VALUES ('Tutorial Town', 'Lowlands', 25, 1);

INSERT
INTO Village(name, region, population, minLevel)
VALUES ('Farms', 'Lowlands', 40, 5);

INSERT
INTO Village(name, region, population, minLevel)
VALUES ('Aria Falls', 'Wicked Forest', 20, 20);

INSERT
INTO Village(name, region, population, minLevel)
VALUES ('Shipton', 'Beach', 50, 30);

INSERT
INTO Village(name, region, population, minLevel)
VALUES ('Frostford', 'Mount Veritas', 25, 40);

INSERT
INTO PetAbility(species, ability)
VALUES ('Cat', 'Heal');

INSERT
INTO PetAbility(species, ability)
VALUES ('Dog', 'Bite');

INSERT
INTO PetAbility(species, ability)
VALUES ('Snake', 'Stun');

INSERT
INTO PetAbility(species, ability)
VALUES ('Bird', 'Fly');

INSERT
INTO PetAbility(species, ability)
VALUES ('Horse', 'Gallop');

INSERT
INTO PetSpecies(name, species)
VALUES ('Bob', 'Cat');

INSERT
INTO PetSpecies(name, species)
VALUES ('Larry', 'Dog');

INSERT
INTO PetSpecies(name, species)
VALUES ('Tabby', 'Cat');

INSERT
INTO PetSpecies(name, species)
VALUES ('Edwin', 'Bird');

INSERT
INTO PetSpecies(name, species)
VALUES ('Stacy', 'Horse');

INSERT
INTO PlayableCharacter(username, class, charLevel, health, energy, attack, defense, speed, pet)
VALUES ('Jay', 'Warrior', 5, 400, 100, 30, 15, 10, 'Bob');

INSERT
INTO PlayableCharacter(username, class, charLevel, health, energy, attack, defense, speed, pet)
VALUES ('Elle', 'Mage', 10, 1200, 110, 40, 25, 15, 'Larry');

INSERT
INTO PlayableCharacter(username, class, charLevel, health, energy, attack, defense, speed, pet)
VALUES ('Simon', 'Priest', 20, 1000, 150, 80, 50, 25, 'Tabby');

INSERT
INTO PlayableCharacter(username, class, charLevel, health, energy, attack, defense, speed, pet)
VALUES ('Alice', 'Warrior', 30, 2000, 270, 100, 80, 30, 'Edwin');

INSERT
INTO PlayableCharacter(username, class, charLevel, health, energy, attack, defense, speed, pet)
VALUES ('Steven', 'Assassin', 40, 3000, 370, 150, 110, 35, 'Stacy');

INSERT
INTO PlayableCharacter(username, class, charLevel, health, energy, attack, defense, speed, pet)
VALUES ('Felix', 'Scout', 15, 350, 100, 40, 20, 30, NULL);

INSERT
INTO EquipmentRarity(name, rarity)
VALUES ('Short Sword', 'Common');

INSERT
INTO EquipmentRarity(name, rarity)
VALUES ('Chainmail', 'Common');

INSERT
INTO EquipmentRarity(name, rarity)
VALUES ('Demonic Staff', 'Rare');

INSERT
INTO EquipmentRarity(name, rarity)
VALUES ('Magic Boots', 'Common');

INSERT
INTO EquipmentRarity(name, rarity)
VALUES ('Frost Glaive', 'Epic');

INSERT
INTO EquipmentRarity(name, rarity)
VALUES ('Light Bow', 'Common');

INSERT
INTO EquipmentRarity(name, rarity)
VALUES ('Shadow Beads', 'Epic');

INSERT
INTO EquipmentRarity(name, rarity)
VALUES ('Ritual Grail', 'Epic');

INSERT
INTO EquipmentRarity(name, rarity)
VALUES ('Singed Wand', 'Common');

INSERT
INTO EquipmentRarity(name, rarity)
VALUES ('Soulless Sabre', 'Epic');

INSERT
INTO EquipmentType(affectedStat, type)
VALUES ('Attack', 'Sword');

INSERT
INTO EquipmentType(affectedStat, type)
VALUES ('Defense', 'Armour');

INSERT
INTO EquipmentType(affectedStat, type)
VALUES ('Energy', 'Staff');

INSERT
INTO EquipmentType(affectedStat, type)
VALUES ('Speed', 'Boots');

INSERT
INTO EquipmentType(affectedStat, type)
VALUES ('Health', 'Helmet');

INSERT
INTO Sells(village, equipment, price)
VALUES ('Tutorial Town', 'Short Sword', 100);

INSERT
INTO Sells(village, equipment, price)
VALUES ('Farms', 'Chainmail', 250);

INSERT
INTO Sells(village, equipment, price)
VALUES ('Aria Falls', 'Demonic Staff', 800);

INSERT
INTO Sells(village, equipment, price)
VALUES ('Shipton', 'Magic Boots', 500);

INSERT
INTO Sells(village, equipment, price)
VALUES ('Frostford', 'Frost Glaive', 900);

INSERT
INTO EquipmentAffectedStat(name, affectedStat)
VALUES ('Short Sword', 'Attack');

INSERT
INTO EquipmentAffectedStat(name, affectedStat)
VALUES ('Chainmail', 'Defense');

INSERT
INTO EquipmentAffectedStat(name, affectedStat)
VALUES ('Demonic Staff', 'Attack');

INSERT
INTO EquipmentAffectedStat(name, affectedStat)
VALUES ('Magic Boots', 'Speed');

INSERT
INTO EquipmentAffectedStat(name, affectedStat)
VALUES ('Frost Glaive', 'Attack');

INSERT
INTO EquipmentUser(name, usedBy)
VALUES ('Short Sword', NULL);

INSERT
INTO EquipmentUser(name, usedBy)
VALUES ('Chainmail', 'Jay');

INSERT
INTO EquipmentUser(name, usedBy)
VALUES ('Demonic Staff', 'Simon');

INSERT
INTO EquipmentUser(name, usedBy)
VALUES ('Magic Boots', NULL);

INSERT
INTO EquipmentUser(name, usedBy)
VALUES ('Frost Glaive', 'Alice');

INSERT
INTO EquipmentName(rarity, affectedStat, name)
VALUES ('Common', 'Attack', 'Short Sword');

INSERT
INTO EquipmentName(rarity, affectedStat, name)
VALUES ('Common', 'Defense', 'Chainmail');

INSERT
INTO EquipmentName(rarity, affectedStat, name)
VALUES ('Rare', 'Attack', 'Demonic Staff');

INSERT
INTO EquipmentName(rarity, affectedStat, name)
VALUES ('Common', 'Speed', 'Magic Boots');

INSERT
INTO EquipmentName(rarity, affectedStat, name)
VALUES ('Epic', 'Attack', 'Frost Glaive');

INSERT
INTO EquipmentStatBoost(rarity, affectedStat, statBoost)
VALUES ('Common', 'Attack', 5);

INSERT
INTO EquipmentStatBoost(rarity, affectedStat, statBoost)
VALUES ('Common', 'Defense', 10);

INSERT
INTO EquipmentStatBoost(rarity, affectedStat, statBoost)
VALUES ('Rare', 'Attack', 40);

INSERT
INTO EquipmentStatBoost(rarity, affectedStat, statBoost)
VALUES ('Common', 'Speed', 5);

INSERT
INTO EquipmentStatBoost(rarity, affectedStat, statBoost)
VALUES ('Epic', 'Attack', 75);

INSERT
INTO DungeonDifficulty(name, difficulty)
VALUES ('The Abandoned Farm', 1);

INSERT
INTO DungeonDifficulty(name, difficulty)
VALUES ('Lair of the Perished Mountain', 4);

INSERT
INTO DungeonDifficulty(name, difficulty)
VALUES ('The Raging Catacombs', 3);

INSERT
INTO DungeonDifficulty(name, difficulty)
VALUES ('The Eternal Cells', 3);

INSERT
INTO DungeonDifficulty(name, difficulty)
VALUES ('The Bleak Tunnels', 2);

INSERT
INTO Contains(equipment, dungeon)
VALUES ('Light Bow', 'The Abandoned Farm');

INSERT
INTO Contains(equipment, dungeon)
VALUES ('Shadow Beads', 'Lair of the Perished Mountain');

INSERT
INTO Contains(equipment, dungeon)
VALUES ('Ritual Grail', 'The Raging Catacombs');

INSERT
INTO Contains(equipment, dungeon)
VALUES ('Singed Wand', 'The Eternal Cells');

INSERT
INTO Contains(equipment, dungeon)
VALUES ('Soulless Sabre', 'The Bleak Tunnels');

INSERT
INTO DungeonName(boss, difficulty, name)
VALUES ('The Bull', 1, 'The Abandoned Farm');

INSERT
INTO DungeonName(boss, difficulty, name)
VALUES ('The Frost Dragon', 4, 'Lair of the Perished Mountain');

INSERT
INTO DungeonName(boss, difficulty, name)
VALUES ('Skulls of Fear', 3, 'The Raging Catacombs');

INSERT
INTO DungeonName(boss, difficulty, name)
VALUES ('The Prison Guard', 3, 'The Eternal Cells');

INSERT
INTO DungeonName(boss, difficulty, name)
VALUES ('The Tree of Evil', 2, 'The Bleak Tunnels');

INSERT
INTO DungeonMinLevelToDifficulty(minLevel, difficulty)
VALUES (5, 1);

INSERT
INTO DungeonMinLevelToDifficulty(minLevel, difficulty)
VALUES (40, 4);

INSERT
INTO DungeonMinLevelToDifficulty(minLevel, difficulty)
VALUES (30, 3);

INSERT
INTO DungeonMinLevelToDifficulty(minLevel, difficulty)
VALUES (90, 8);

INSERT
INTO DungeonMinLevelToDifficulty(minLevel, difficulty)
VALUES (20, 2);

INSERT
INTO DungeonMinLevel(boss, difficulty, minLevel)
VALUES ('The Bull', 1, 5);

INSERT
INTO DungeonMinLevel(boss, difficulty, minLevel)
VALUES ('The Frost Dragon', 4, 40);

INSERT
INTO DungeonMinLevel(boss, difficulty, minLevel)
VALUES ('Skulls of Fear', 3, 30);

INSERT
INTO DungeonMinLevel(boss, difficulty, minLevel)
VALUES ('The Prison Guard', 3, 30);

INSERT
INTO DungeonMinLevel(boss, difficulty, minLevel)
VALUES ('The Tree of Evil', 2, 20);

INSERT
INTO DungeonRegion(boss, difficulty, region)
VALUES ('The Bull', 1, 'Lowlands');

INSERT
INTO DungeonRegion(boss, difficulty, region)
VALUES ('The Frost Dragon', 4, 'Mount Veritas');

INSERT
INTO DungeonRegion(boss, difficulty, region)
VALUES ('Skulls of Fear', 3, 'Beach');

INSERT
INTO DungeonRegion(boss, difficulty, region)
VALUES ('The Prison Guard', 3, 'Beach');

INSERT
INTO DungeonRegion(boss, difficulty, region)
VALUES ('The Tree of Evil', 2, 'Wicked Forest');

INSERT
INTO NPC(name, title, village)
VALUES ('Gerald', 'Leader', 'Tutorial Town');

INSERT
INTO NPC(name, title, village)
VALUES ('Archibald', 'Forest Elf', 'Aria Falls');

INSERT
INTO NPC(name, title, village)
VALUES ('Petra', 'Farmer', 'Farms');

INSERT
INTO NPC(name, title, village)
VALUES ('Maurelle', 'Shiphand', 'Shipton');

INSERT
INTO NPC(name, title, village)
VALUES ('Sampson', 'Adventurer', 'Frostford');

INSERT
INTO Interacts(NPC, playableCharacter)
VALUES ('Gerald', 'Jay');

INSERT
INTO Interacts(NPC, playableCharacter)
VALUES ('Archibald', 'Jay');

INSERT
INTO Interacts(NPC, playableCharacter)
VALUES ('Petra', 'Jay');

INSERT
INTO Interacts(NPC, playableCharacter)
VALUES ('Maurelle', 'Jay');

INSERT
INTO Interacts(NPC, playableCharacter)
VALUES ('Sampson', 'Jay');

INSERT
INTO Quest(title, difficulty, reward, length, minLevel, startNPC)
VALUES ('First Steps', 1, 500, 2, 1, 'Gerald');

INSERT
INTO Quest(title, difficulty, reward, length, minLevel, startNPC)
VALUES ('Too Many Weeds', 2, '600', 2, 5, 'Petra');

INSERT
INTO Quest(title, difficulty, reward, length, minLevel, startNPC)
VALUES ('Collect Clams', 4, 1500, 3, 30, 'Maurelle');

INSERT
INTO Quest(title, difficulty, reward, length, minLevel, startNPC)
VALUES ('Forest Restoration', 3, 800, 3, 20, 'Archibald');

INSERT
INTO Quest(title, difficulty, reward, length, minLevel, startNPC)
VALUES ('Slippery Hike', 5, 2000, 4, 40, 'Sampson');

INSERT
INTO WorksOn(quest, NPC, playableCharacter)
VALUES ('First Steps', 'Gerald', 'Jay');

INSERT
INTO WorksOn(quest, NPC, playableCharacter)
VALUES ('Too Many Weeds', 'Petra', 'Simon');

INSERT
INTO WorksOn(quest, NPC, playableCharacter)
VALUES ('Collect Clams', 'Maurelle', 'Jay');

INSERT
INTO WorksOn(quest, NPC, playableCharacter)
VALUES ('Forest Restoration', 'Archibald', 'Elle');

INSERT
INTO WorksOn(quest, NPC, playableCharacter)
VALUES ('Slippery Hike', 'Sampson', 'Alice');

INSERT
INTO PetOwner(name, owner)
VALUES ('Bob', 'Jay');

INSERT
INTO PetOwner(name, owner)
VALUES ('Larry', 'Elle');

INSERT
INTO PetOwner(name, owner)
VALUES ('Tabby', 'Simon');

INSERT
INTO PetOwner(name, owner)
VALUES ('Edwin', 'Alice');

INSERT
INTO PetOwner(name, owner)
VALUES ('Stacy', 'Steven');

INSERT
INTO PetLevel(species, abilityCooldown, pLevel)
VALUES ('Bob', 8, 3);

INSERT
INTO PetLevel(species, abilityCooldown, pLevel)
VALUES ('Larry', 3, 8);

INSERT
INTO PetLevel(species, abilityCooldown, pLevel)
VALUES ('Tabby', 6, 5);

INSERT
INTO PetLevel(species, abilityCooldown, pLevel)
VALUES ('Edwin', 10, 6);

INSERT
INTO PetLevel(species, abilityCooldown, pLevel)
VALUES ('Stacy', 5, 6);

INSERT
INTO Monster(name, type, monsLevel, health, attack, defense, defends)
VALUES ('Timid Zombie', 'Undead', 1, 50, 5, 0, NULL);

INSERT
INTO Monster(name, type, monsLevel, health, attack, defense, defends)
VALUES ('Clam', 'Water', 20, 800, 30, 10, NULL);

INSERT
INTO Monster(name, type, monsLevel, health, attack, defense, defends)
VALUES ('Tree Sprite', 'Earth', 5, 300, 10, 2, NULL);

INSERT
INTO Monster(name, type, monsLevel, health, attack, defense, defends)
VALUES ('Mountain Goat', 'Ice', 30, 1200, 50, 30, NULL);

INSERT
INTO Monster(name, type, monsLevel, health, attack, defense, defends)
VALUES ('Clay Dummy', 'Earth', 10, 700, 20, 5, NULL);

INSERT
INTO Monster(name, type, monsLevel, health, attack, defense, defends)
VALUES ('The Bull', 'Normal', 10, 700, 20, 5, 'The Abandoned Farm');

INSERT
INTO Monster(name, type, monsLevel, health, attack, defense, defends)
VALUES ('Skulls of Fear', 'Undead', 1, 50, 5, 0, 'The Raging Catacombs');

INSERT
INTO Monster(name, type, monsLevel, health, attack, defense, defends)
VALUES ('The Prison Guard', 'Undead', 1, 50, 5, 0, 'The Eternal Cells');

INSERT
INTO Monster(name, type, monsLevel, health, attack, defense, defends)
VALUES ('The Tree of Evil', 'Earth', 25, 1000, 75, 100, 'The Bleak Tunnels');

INSERT
INTO Monster(name, type, monsLevel, health, attack, defense, defends)
VALUES ('The Frost Dragon', 'Ice', 75, 5000, 250, 400, 'Lair of the Perished Mountain');

INSERT
INTO Monster(name, type, monsLevel, health, attack, defense, defends)
VALUES ('Sleepy Spider', 'Earth', 10, 700, 20, 5, NULL);

INSERT
INTO Monster(name, type, monsLevel, health, attack, defense, defends)
VALUES ('Beach Crab', 'Water', 30, 1200, 50, 30, NULL);

INSERT
INTO Monster(name, type, monsLevel, health, attack, defense, defends)
VALUES ('Mountain Bear', 'Ice', 30, 1200, 50, 30, NULL);

INSERT
INTO Fights(playableCharacter, monster)
VALUES ('Jay', 'Timid Zombie');

INSERT
INTO Fights(playableCharacter, monster)
VALUES ('Simon', 'Clam');

INSERT
INTO Fights(playableCharacter, monster)
VALUES ('Elle', 'Tree Sprite');

INSERT
INTO Fights(playableCharacter, monster)
VALUES ('Alice', 'Mountain Goat');

INSERT
INTO Fights(playableCharacter, monster)
VALUES ('Felix', 'Clay Dummy');

INSERT
INTO Boss(name, ability)
VALUES ('The Bull', 'Unstoppable Charge');

INSERT
INTO Boss(name, ability)
VALUES ('Clam', 'Water Gun');

INSERT
INTO Boss(name, ability)
VALUES ('Skulls of Fear', 'Death Bite');

INSERT
INTO Boss(name, ability)
VALUES ('The Prison Guard', 'Bat Strike');

INSERT
INTO Boss(name, ability)
VALUES ('The Tree of Evil', 'Roots of Doom');

INSERT
INTO Boss(name, ability)
VALUES ('The Frost Dragon', 'Frozen Roar');

INSERT
INTO Boss(name, ability)
VALUES ('Tree Sprite', 'Vine Whip');

INSERT
INTO Neutral(name, triggeredBy)
VALUES ('Sleepy Spider', 'Loud noise');

INSERT
INTO Neutral(name, triggeredBy)
VALUES ('Timid Zombie', 'Proximity');

INSERT
INTO Neutral(name, triggeredBy)
VALUES ('Clay Dummy', 'Proximity');

INSERT
INTO Neutral(name, triggeredBy)
VALUES ('Beach Crab', 'Damage');

INSERT
INTO Neutral(name, triggeredBy)
VALUES ('Mountain Bear', 'Damage');

