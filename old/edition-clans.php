<?php
function show_page()
{
?>
<div style="text-align: left;width: 700px;">
<span style="color: #bc311e;font-size: 20px;">EDITER UN CLAN</span><br/>

_____________________________________________________________________________________<br/>
<form method="post" action="traitement-clan.php">
	<div style="width: 350px;float: left;">
		<p>
			<label>Adresse E-mail</label> :* <input type="email" name="email" style="margin-left: 47px;"/>
		</p>
		<p>
			<label>Mot de passe</label> :* <input type="password" name="password" style="margin-left: 62px;"/>
		</p>
		<p>
			<label>Nom du clan</label> :* <input type="text" name="nomclan" style="margin-left: 63px;"/>
		</p>
		<p>
			<label>Pseudo du fondateur</label> :* <input type="text" name="pseudo" style="margin-left: 14px;"/>
		</p>
		<p>
			<label>Description</label> : <br/><textarea style="width: 300px;height: 100px;" name="description"></textarea>
		</p>
	</div>
	<div>
		<p>
			<label>Adresse site web</label> : <input type="url" name="siteweb" style="margin-left: 46px;"/>
		</p>
		<p>
			<label>Topic taleworlds forum</label> : <input type="text" name="topic" style="margin-left: 4px;"/>
		</p>
		<p>
			<label>Tag de clan</label> : <input type="text" name="tag" style="margin-left: 81px;"/>
		</p>
		<p>
			<label>Devise</label> : <input type="text" name="devise" style="margin-left: 110px;"/>
		</p>
		<p>
			<label>Logo</label> : <input type="file" name="logo" />
		</p>
		<p>
			<label>Page facebook</label> : <input type="text" name="facebook" style="margin-left: 62px;"/>
		</p>
		<p>
			<label>Chaîne youtube</label> : <input type="text" name="youtube" style="margin-left: 55px;"/>
		</p>
</div>
		_____________________________________________________________________________________<br/><br/>
	<div style="width: 350px;float: left;">
		<span style="color: #bc311e;font-size: 17px;">Roleplay</span>
		<p>
			<label><span style="font-weight:bold;">Faction préférée</span></label> :<br/> 
				<SELECT name="nom" size="1">
				<OPTION selected>Neutre
				<OPTION>Empire Calradien
				<OPTION>Vlandiens
				<OPTION>Sturgiens
				<OPTION>Aserai
				<OPTION>Khuzaits
				<OPTION>Battaniens
				</SELECT>
		</p>
		<p>
			<label><span style="font-weight:bold;">Mods joués</span></label> : <br />
			<input type="checkbox" name="mod1" /> Native<br/>
		</p>
	</div>
	<div>
		<span style="color: #bc311e;font-size: 17px;">Recrutement et Hiérarchie</span><br/>
		<p>
			<label>Recrutement ouvert</label> : <select name="recruit" > <option value="1">Oui</option>  <option value="0">Non</option> </select>
		</p>
		<p>
			<label><span style="font-weight:bold;">Rangs</span></label> : <br/>
			<input type="text" name="rang1" /> Rang 1<br/>
			<input type="text" name="rang2" /> Rang 2<br/>
			<input type="text" name="rang3" /> Rang 3<br/>
			<input type="text" name="rang4" /> Rang 4<br/>
			<input type="text" name="rang5" /> Rang 5<br/>
		</p>
	</div>
		<span style="color: #bc311e;font-size: 17px;">Orientations</span>
		<p>
			Pas de roleplay <input type="range" name="roleplay" max="5" min="1" step="1" /> Très roleplay
		</p>
		<p>
			Démocratique <input type="range" name="autoritaire" max="5" min="1" step="1" /> Autoritaire
		</p>
		<p>
			Pas de présence régulière requise<input type="range" name="presence" max="5" min="1" step="1" /> Présence régulière requise
		</p>
		<p>
			Recrutement non-sélectif <input type="range" name="selectif" max="5" min="1" step="1" />Recrutement sélectif  
		</p>
		<p>
			Non compétitif <input type="range" name="competitif" max="5" min="1" step="1" /> Compétitif
		</p>
		
		<span style="color: #bc311e;font-size: 17px;">Serveurs</span><br/>
		<p>
			<label>Teamspeak</label> : <input type="text" name="teamspeak" style="margin-left: 20px;"/>
		</p>
		<p>
			<label>Serveur de jeu</label> : <input type="text" name="serveur" />
		</p>
		<br/><input type="submit" value="submit">
	</form>
</div>

<?php
}
?>