/***********************************************************
*  Module       : General
*  Language     : French
*  Version      : 5.4.0
*  License      : GPL
*  Author       : ABOnline solutions http://www.vtiger-crm.fr
***********************************************************/

var alert_arr = {
	'DELETE':'Voulez-vous supprimer ',
	'RECORDS':' enregistrement(s) ?',
	'SELECT':'Merci de sélectionner au moins une entité',
	'SELECTCONDITION':'Please select at least one condition',
	'SELECTTEMPLATE':'Please select at least one document Template',
	'SELECTMERGE':'Please select an entity to merge!',
	'GENDOCSAVED':'Document saved. Please verify that it has been created correctly.',
	'DELETE_ACCOUNT':'Supprimer ce(s) compte(s) va supprimer les affaires et devis liés. Etes-vous sûr de vouloir supprimer  ',
	'DELETE_VENDOR':'Supprimer ce fournisseur va supprimer les commandes fournisseur liée. Etes vous sûr de vouloir supprimer  ',
	'SELECT_MAILID':'Selectionnez un email',
	'OVERWRITE_EXISTING_ACCOUNT1':'Souhaitez-vous utiliser l\'adresse du compte en remplacement (',
	'OVERWRITE_EXISTING_ACCOUNT2':') détails de l\'adresse ?',
	'OVERWRITE_EXISTING_CONTACT1':'Ecraser l\'adresse existante avec le contact sélectionné (',
	'OVERWRITE_EXISTING_CONTACT2':') détails de l\'adresse ?',
	'MISSING_FIELDS':'Champs obligatoire manquant:',
	'NOT_ALLOWED_TO_EDIT':'Vous n\'êtes pas autorisé à modifier ce champs',
	'NOT_ALLOWED_TO_EDIT_FIELDS':'Vous n\'êtes pas autorisé à modifier ces champs',
	'COLUMNS_CANNOT_BE_EMPTY':'Les colonnes sélectionnées ne peuvent être vide',
	'CANNOT_BE_EMPTY':' ne peut être vide',
	'CANNOT_BE_NONE':'ne peut-être nulle',
	'ENTER_VALID':'Merci d\'entrer correctement',
	'SHOULDBE_LESS':'doit être inférieur à',
	'SHOULDBE_LESS_EQUAL':'doit être inférieur ou égal à',
	'SHOULDBE_EQUAL':'doit être égal à',
	'SHOULDBE_GREATER':'doit être supérieur à',
	'SHOULDBE_GREATER_EQUAL':' doit être supérieur ou égal à ',
	'INVALID':'Invalide',
	'EXCEEDS_MAX':'Dépasse la limite maximale',
	'OUT_OF_RANGE':'n\'est pas dans la norme',
	'SHOULDNOTBE_EQUAL':'Ne peut pas être égal à',
	'PORTAL_PROVIDE_EMAILID':'L\'utilisateur du portail client doit fournir un email pour se connecter',
	'ADD_CONFIRMATION':'Etes vous sûr de vouloir ajouter la sélection',
	'ACCOUNTNAME_CANNOT_EMPTY':'Le nom de compte doit être renseigné',
	'CANT_SELECT_CONTACTS':'Vous ne pouvez pas sélectionner les contacts liés aux leads',
	'LBL_THIS':'Ce',
	'DOESNOT_HAVE_MAILIDS':'n\'a aucun email',
	'DOESNOT_HAVE_AN_MAILID':'" n\'a aucun email',
	'MISSING_REQUIRED_FIELDS':'Champs requis manquants :',
	'READONLY':'est en lecture seule',
	'SELECT_ATLEAST_ONE_USER':'Sélectionnez au moins un utilisateur',
	'DISABLE_SHARING_CONFIRMATION':'Êtes-vous sûr d\'arrêter le partage avec la sélection',
	'USERS':'Utilisateur(s) ?',
	'ENDTIME_GREATER_THAN_STARTTIME':'La date de fin doit être postérieure a celle de début',
	'MISSING_EVENT_NAME':'Nom évènement non renseigné',
	'EVENT_TYPE_NOT_SELECTED':'Le type d\'activité n\'est pas sélectionné',
	'SITEURL_CANNOT_BE_EMPTY':'L\'adresse du site doit être renseignée',
	'SITENAME_CANNOT_BE_EMPTY':'Le nom du site doit être renseigné',
	'LISTPRICE_CANNOT_BE_EMPTY':'La grille tarifaire ne peut être vide',
	'INVALID_LIST_PRICE':'Grille tarifaire invalide',
	'PROBLEM_ACCESSSING_URL':'Problème d\'accès à l\'adresse :',
	'CODE':' Code : ',
	'WISH_TO_QUALIFY_MAIL_AS_CONTACT':'Êtes-vous sûr de vouloir lier ce mail à ce contact ?',
	'SELECT_ATLEAST_ONEMSG_TO_DEL':'Sélectionnez au moins un message à supprimer',
	'ERROR':'Erreur',
	'FIELD_TYPE_NOT_SELECTED':'Le type de champ n\'est pas sélectionné',
	'SPECIAL_CHARACTERS_NOT_ALLOWED':'Les caractères spéciaux ne sont pas autorisés dans ce champ',
	'SPECIAL_CHARACTERS':'Caractères spéciaux',
	'NOT_ALLOWED':'n\'est pas permis. Essayez de nouveau avec une nouvelle valeur',
	'DUPLICATE_MAPPING_ACCOUNTS':'Mapping en doublon pour les comptes!',
	'DUPLICATE_MAPPING_CONTACTS':'Mapping en doublon pour les contacts!',
	'DUPLICATE_MAPPING_POTENTIAL':'Mapping en doublon pour les affaires!',
	'ERROR_WHILE_EDITING':'Erreur d\'édition',
	'CURRENCY_CHANGE_INFO':'Le changement de taux de change a été effectué avec succès',
	'CURRENCY_CONVERSION_INFO':'Utilisez vous des Dollar $ comme devise? \n Cliquez OK pour rester en $, Annulez pour changer le taux de change',
	'THE_EMAILID':'L\'email \\\'',
	'EMAIL_FIELD_INVALID':'\\\' dans le mail est invalide',
	'MISSING_REPORT_NAME':'Nom de rapport manquant',
	'REPORT_NAME_EXISTS':'Nom de rapport déja existant, essayez de nouveau...',
	'WANT_TO_CHANGE_CONTACT_ADDR':'Souhaitez vous modifier l\'adresse du contact par l\'adresse du compte ?',
	'SURE_TO_DELETE':'Etes vous sûr de vouloir supprimer ?',
	'NO_PRODUCT_SELECTED':'Aucun produit sélectionné. Sélectionnez-en au moins un',
	'VALID_FINAL_PERCENT':'Entrez une remise en % valide',
	'VALID_FINAL_AMOUNT':'Entrez un montant de remise valide',
	'VALID_SHIPPING_CHARGE':'Entrez des frais de port valides',
	'VALID_ADJUSTMENT':'Entrez un avoir/relicat valide',
	'WANT_TO_CONTINUE':'Souhaitez-vous continuer ?',
	'ENTER_VALID_TAX':'Entrez une valeur de taxe valide',
	'VALID_TAX_NAME':'Entrez une taxe valide',
	'CORRECT_TAX_VALUE':'Saisir une valeur de taxe valide',
	'ENTER_POSITIVE_VALUE':'Saisir une valeur positive',
	'LABEL_SHOULDNOT_EMPTY':'Saisir un label de taxe non vide',
	'NOT_VALID_ENTRY':' n\'est pas une valeur correcte. Merci de rectifier',
	'VALID_DISCOUNT_PERCENT':'Saisir un pourcentage de remise valide',
	'VALID_DISCOUNT_AMOUNT':'Saisir un montant de remise valide',
	'SELECT_TEMPLATE_TO_MERGE':'Choisir un modèle de fusion',
	'SELECTED_MORE_THAN_ONCE':'Vous avez sélectionné les éléments suivants plus d\'une fois',
	'YES':'oui',
	'NO':'non',
	'MAIL':'mail',
	'EQUALS':'égal à',
	'NOT_EQUALS_TO':'différent de',
	'STARTS_WITH':'commence par',
	'CONTAINS':'contient',
	'DOES_NOT_CONTAINS':'ne contient pas',
	'LESS_THAN':'inférieur à',
	'GREATER_THAN':'supérieur à',
	'LESS_OR_EQUALS':'inférieur ou égal',
	'GREATER_OR_EQUALS':'supérieur ou égal',
	'LBL_DOES_NOT_START_WITH' : 'does not start with',
	'LBL_DOES_NOT_END_WITH' : 'does not end with',
	'DOES_NOT_START_WITH':'does not start with',
	'DOES_NOT_END_WITH':'does not end with',
	'SOUNDEX':'soundex',
	'REGEXP':'regexp',
	'Widget_Deleted_Sucessfully':'Widget deleted sucessfully',

	'NO_SPECIAL_CHARS':'Les caractères spéciaux comme les guillemets, backslash, symboles mathématiques, pourcentages et de ponctuation ne sont pas autorisés',
	'PLS_SELECT_VALID_FILE':'Choisir un fichier avec l\'extension suivante:\n',
	'NO_SPECIAL':'Les caractères spéciaux ne sont pas autorisés',
	'NO_QUOTES':'Les guillements (\' ") et le symbole + ne sont pas autorisés ',
	'IN_PROFILENAME':' dans les noms de profil',
	'IN_GROUPNAME':' dans les noms de groupe',
	'IN_ROLENAME':' dans les noms de rôles',
	'VALID_TAX_PERCENT':'Entrer un pourcentage de taxe valide',
	'VALID_SH_TAX':'Entrer une taxe valide pour les frais de transport',
	'ROLE_DRAG_ERR_MSG':'Impossible de déplacer un noeud Parent vers un noeud fils',
	'LBL_DEL':'suppr',
	'VALID_DATA':'Donnée invalide, réessayez svp',
	'STDFILTER':'Filtres standards',
	'STARTDATE':'Date de début',
	'ENDDATE':'Date de fin',
	'START_DATE_TIME':'Date et heure de début',
	'START_TIME':'Heure de début',
	'LBL_AND':'Et',
	'LBL_OR': 'Ou',
	'LBL_ENTER_VALID_PORT':'Entrez un numéro de port valide',
	'IN_USERNAME':' dans le nom d\'utilisateur',
	'LBL_ENTER_VALID_NO':'Entrez un nombre valide',
	'LBL_PROVIDE_YES_NO':'Valeur incorrecte.\n Répondez par oui ou par non',
	'LBL_SELECT_CRITERIA':'Critère invalide.\n Sélectionnez un autre critère',
	'OPPORTUNITYNAME_CANNOT_BE_EMPTY':'Le nom de l\'affaire doit être renseigné',
	'NAME_DESC':' pour le nom et la description du répertoire',
	'ENDS_WITH':' fini par ',
	'SHARED_EVENT_DEL_MSG':'L\'utilisateur n\'a pas l\'autorisation d\'éditer/supprimer cette tâche',

	'LBL_WRONG_IMAGE_TYPE':'Les extensions autorisées pour les contacts sont :- jpeg, png, jpg, pjpeg, x-png et gif',
	'SELECT_MAIL_MOVE':'Sélectionnez un email à déplacer',

	'LBL_NOTSEARCH_WITHSEARCH_ALL':'Vous n\'avez pas utilisé la recherche. Tous les enregistrements vont être exportés à partir de ',
	'LBL_NOTSEARCH_WITHSEARCH_CURRENTPAGE':'Vous n\'avez pas utilisé la recherche mais vous avez sélectionner l\'option "Exporter avec les critères de recherche", Donc tous les enregistrements vont être exportés à partir de ',
	'LBL_NO_DATA_SELECTED':'Aucun enregistrement n\'est sélectionné. Sélectionnez-en au moins un pour exporter',
	'LBL_SEARCH_WITHOUTSEARCH_ALL':'Vous avez utilisé les options de recherche mais vous n\'avez pas sélectionné d\'options.\nVous pouvez cliquer sur [ok] pour exporter toutes les données ou vous pouvez cliquer sur [annuler] et réessayer avec d\'autres paramètres d\'export',
	'STOCK_IS_NOT_ENOUGH':'Stock trop faible',
	'LBL_QTY_IN_STOCK' : 'Qté en stock',
	'INVALID_QTY':'Quantité invalide',
	'LBL_SEARCH_WITHOUTSEARCH_CURRENTPAGE':'Vous avez utilisé les options de recherche mais vous n\'avez pas sélectionné d\'options.\nVous pouvez cliquer sur [ok] pour exporter toutes les données ou vous pouvez cliquer sur [annuler] et réessayer avec d\'autres paramètres d\'export',
	'LBL_SELECT_COLUMN':'Colonne invalide. Sélectionnez une autre colonne',
	'LBL_NOT_ACCESSIBLE':'Non accessible',
	'LBL_FILENAME_LENGTH_EXCEED_ERR':'Le nom de fichier ne peut dépasser 255 caractères',
	'LBL_DONT_HAVE_EMAIL_PERMISSION':'Vous n\'avez pas la permission d\'éditer le champs Email. Vous ne pouvez choisir l\'id de mail',
	'LBL_NO_FEEDS_SELECTED':'Aucun flux sélectionné',
	'LBL_SELECT_PICKLIST':'Sélectionnez au moins une valeur à supprimer',
	'LBL_CANT_REMOVE':'Vous ne pouvez supprimer toutes les valeurs',

	'LBL_GIVE_PICKLIST_VALUE':'Merci de fournir de nouvelles valeurs pour les valeurs à remplacer',
	'LBL_SELECT_ROLE':'Merci de sélectionner au moins un rôle pour les nouvelles valeurs à ajouter',
	'LBL_ADD_PICKLIST_VALUE':'Merci de fournir au moins une nouvelle valeur à ajouter',
	'LBL_NO_VALUES_TO_DELETE': 'Aucune valeur à supprimer',

	'SAME_GROUPS': 'Vous devez sélectionner les enregistrements dans le même groupe pour les fusionner',
	'ATLEAST_TWO': 'Sélectionner au moins deux enregistrements à fusionner',
	'MAX_THREE': 'Vous avez la possibilité de sélectionner un maximum de 3 enregistrements',
	'MAX_RECORDS_EXCEEDED': 'You have exceeded the maximum amount of selectable records',
	'MAX_RECORDS': 'Vous avez la possibilité de sélectionner un maximum de 4 enregistrements',
	'CON_MANDATORY': 'Sélectionnez le champ obligatoire "Nom"',
	'LE_MANDATORY': 'Sélectionnez les champs obligatoires "Nom" et "Société"',
	'ACC_MANDATORY': 'Sélectionnez le champ obligatoire "Compte"',
	'PRO_MANDATORY': 'Sélectionnez le champ obligatoire "Produit"',
	'TIC_MANDATORY': 'Sélectionnez le champ obligatoire "Titre du ticket"',
	'POTEN_MANDATORY': 'Sélectionnez le champ obligatoire "Nom de l\'affaire"',
	'VEN_MANDATORY': 'Sélectionnez le champ obligatoire "Nom du Vendeur"',

	'DEL_MANDATORY': 'Vous n\'avez pas la possibilité de supprimer le champ obligatoire',
	'MSG_CHANGE_CURRENCY_REVISE_UNIT_PRICE': 'Etes-vous sûr de vouloir mettre à jour les prix unitaires de chaque devise dans la devise sélectionnée ?',

	'Select_one_record_as_parent_record' : 'Sélectionnez un enregistrement comme parent',
	'RECURRING_FREQUENCY_NOT_PROVIDED' : 'Fréquence de récurrence non spécifiée',
	'RECURRING_FREQENCY_NOT_ENABLED' : 'La fréquence de récurrence est donnée mais la récurrence est désactivée',
	'NO_SPECIAL_CHARS_DOCS':'Les caractères spéciaux comme les guillemets, backslash, symboles mathématiques, pourcentages et de ponctuation ne sont pas permis',
	'FOLDER_NAME_TOO_LONG':'Le nom du répertoire est trop long. Réessayez!',
	'FOLDERNAME_EMPTY':'Le nom du répertoire ne peut être vide',
	'DUPLICATE_FOLDER_NAME':'Le nom du répertoire existe déjà. Réesssayez',
	'FOLDER_DESCRIPTION_TOO_LONG':'La description du répertoire est trop longue. Réessayez',
	'NOT_PERMITTED':'Vous n\'êtes pas autorisé à effectuer cette opération.',

	'ALL_FILTER_CREATION_DENIED':'Vtiger ne peut pas créer de vue personnalisée en utilisant le terme "All", utilisez un autre nom pour cette vue',
	'OPERATION_DENIED':'Vous n\'avez pas les droits pour effectuer cette action',
	'EMAIL_CHECK_MSG': 'Désactiver l\'accès au portail qui permet de conserver le champ email vide',
	'IS_PARENT' : 'Ce produit est décliné en sous-produits : vous n\'êtes pas autorisé à choisir un "parent" pour ce produit',

	'PICKLIST_CANNOT_BE_EMPTY': 'La liste ne peut être vide',
	'DUPLICATE_VALUES_FOUND': 'Doublons détectés',
	'LBL_NO_ROLES_SELECTED': 'Aucun rôle n\'a été selectionné, Voulez-vous continuer ?',
	'LBL_DUPLICATE_FOUND': 'Doublon détecté dans les entrées ',
	'LBL_CANNOT_HAVE_EMPTY_VALUE': 'Ne peut être remplacé par une valeur vide, pour supprimer la valeur, utilisez le bouton supprimer.',
	'LBL_DUPLICATE_VALUE_EXISTS': 'Doublons existants',
	'LBL_WANT_TO_DELETE': 'Ceci supprimera les valeurs sélectionnées de la liste pour tous les rôles. Etes-vous sûr de vouloir continuer? ',
	'LBL_DELETE_ALL_WARNING': 'La liste doit contenir au moins une valeur',
	'LBL_PLEASE_CHANGE_REPLACEMENT': 'Changer la valeur de remplacement car elle est déjà sélectionner pour la suppression',
	'BLOCK_NAME_CANNOT_BE_BLANK': 'Le nom du bloc ne peut être vide',
	'ARE_YOU_SURE_YOU_WANT_TO_DELETE' : 'Etes vous sûr de vouloir supprimer?',
	'ARE_YOU_SURE_YOU_WANT_TO_DELETE_EXACT_DUPLICATE': 'Are you sure you want to Delete All Exact record duplicates?',
	'PLEASE_MOVE_THE_FIELDS_TO_ANOTHER_BLOCK' : 'Merci de déplacer les champs dans un autre bloc',
	'ARE_YOU_SURE_YOU_WANT_TO_DELETE_BLOCK' : 'Etes vous sûr de vouloir supprimer le bloc?',
	'LABEL_CANNOT_NOT_EMPTY' : 'Le label ne peut être vide',
	'LBL_TYPEALERT_1' : 'Désolé, vous ne pouvez mapper le ',
	'LBL_WITH' : ' avec ',
	'LBL_TYPEALERT_2' : ' type de donnée. Merci de mapper des données de même type.',
	'LBL_LENGTHALERT' : 'Désolé, vous ne pouvez pas mapper des champs avec différentes tailles de caractères. Merci de mapper des données avec une taille de caractères identique ou plus grande.',
	'LBL_DECIMALALERT' : 'Désolé, vous ne pouvez pas mapper des champs avec un nombre de décimales différent. Merci de mapper des données avec le même nombre ou plus de décimales.',
	'PICKLIST2PICKLISTALERT': 'Please make sure both picklists share the same values',
	'PICKLIST2TEXTALERT': 'Please make sure the destination text field can hold the longest picklist value',
	'FIELD_IS_MANDATORY' : 'Champ obligatoire',
	'FIELD_IS_ACTIVE' : 'Le champ est prêt à être utilisé',
	'FIELD_IN_QCREATE' : 'Présent dans la création rapide',
	'FIELD_IS_MASSEDITABLE' : 'Disponible pour l\'édition de masse',
	'IS_MANDATORY_FIELD' : ' est un champ obligatoire',
	'CLOSEDATE_CANNOT_BE_EMPTY' : 'La date de fermeture ne peut être vide',
	'AMOUNT_CANNOT_BE_EMPTY' : 'Le montant ne peut être vide',
	'ARE_YOU_SURE' : 'Etes vous sûr de vouloir supprimer?',
	'LABEL_ALREADY_EXISTS' : 'Ce libellé existe déjà. Merci de créer un libellé différent',
	'LENGTH_OUT_OF_RANGE' : 'La longueur du bloc ne peut dépasser 50 caractères',
	'LBL_SELECT_ONE_FILE' : 'Merci de sélectionner au moins un fichier',
	'LBL_UNABLE_TO_ADD_FOLDER' : 'Impossible d\'ajouter le répertoire. Merci de réessayer.',
	'LBL_ARE_YOU_SURE_YOU_WANT_TO_DELETE_FOLDER' : 'Etes-vous sûr de vouloir supprimer ce répertoire?',
	'LBL_ERROR_WHILE_DELETING_FOLDER' : 'Erreur lors de la suppression du répertoire. Merci de réessayer ultérieurement.',
	'LBL_FILE_CAN_BE_DOWNLOAD' : 'Le fichier est disponible au téléchargement',
	'LBL_DOCUMENT_LOST_INTEGRITY':'Ce document n\'est pas disponible. Il est peut-être marqué indisponible',
	'LBL_DOCUMENT_NOT_AVAILABLE' : 'Ce document n\'est pas disponible au téléchargement',
	'LBL_FOLDER_SHOULD_BE_EMPTY' : 'Le répertoire doit être vide pour être supprimé!',

	'LBL_PLEASE_SELECT_FILE_TO_UPLOAD' : 'Sélectionnez le fichier à télécharger.',
	'LBL_ARE_YOU_SURE_TO_MOVE_TO' : 'Etes-vous sûr de vouloir déplacer le(s)fichiers(s) vers ',
	'LBL_FOLDER' : ' répertoire ',
	'LBL_UNABLE_TO_UPDATE' : 'Impossible de mettre à jour! Réessayez.',
	'LBL_BLANK_REPLACEMENT': 'Vous ne pouvez sélectionner des valeurs vides pour le déplacement',

	'LBL_IMAGE_DELETED' : 'Suppression d\'image',

	'ERR_FIELD_SELECTION' : 'Erreurs dans la sélection des champs',
	'NO_LINE_ITEM_SELECTED' : 'Aucune ligne d\'article sélectionnée. Sélectionnez au moins une ligne.',
	'LINE_ITEM' : 'Rubrique',
	'LIST_PRICE': 'Liste des prix',

	'LBL_PRINT_EMAIL' : 'Imprimer',
	'LBL_DELETE_EMAIL' : 'Supprimer',
	'LBL_DOWNLOAD_ATTACHMENTS' : 'Télécharger pièce jointe',
	'LBL_QUALIFY_EMAIL' : 'Qualifier',
	'LBL_FORWARD_EMAIL' : 'Transférer',
	'LBL_REPLY_TO_SENDER' : 'Répondre',
	'LBL_REPLY_TO_ALL' : 'Repondre à tous',

	'LBL_WIDGET_HIDDEN' : 'Widget vide',
	'LBL_RESTORE_FROM_PREFERENCES' : 'Vous pourrez restaurer à partir de vos préférences',
	'ERR_HIDING' : 'Erreur de masquage',
	'MSG_TRY_AGAIN' : 'Merci de réessayer',

	'MSG_ENABLE_SINGLEPANE_VIEW' : 'Vue linéaire activée',
	'MSG_DISABLE_SINGLEPANE_VIEW' : 'Vue linéaire désactivée',

	'MSG_FTP_BACKUP_DISABLED' : 'Backup FTP Désactivé',
	'MSG_LOCAL_BACKUP_DISABLED' : 'Local Backup Désactivé',
	'MSG_FTP_BACKUP_ENABLED' : 'Backup FTP Activé',
	'MSG_LOCAL_BACKUP_ENABLED' : 'Backup local Activé',
	'MSG_CONFIRM_PATH' : 'Confirmer avec les détails du chemin',
	'MSG_CONFIRM_FTP_DETAILS' : 'Confirmer avec les détails FTP',

	'START_PERIOD_END_PERIOD_CANNOT_BE_EMPTY' : 'Les périodes de début ou de fin ne peuvent pas être vide',
	'LBL_ADD': 'Ajouter ',
	'Module': 'Module',
	'DashBoard': 'Tableau de bord',
	'RSS': 'RSS',
	'Default': 'Défaut',
	'Notebook': 'Bloc note',
	'ReportCharts': 'Rapport graphique',
	'CustomWidget': 'Aggregate Filter',
	'SPECIAL_CHARS':'\\ / < > + \' " ',

	'BETWEEN': 'entre',
	'BEFORE': 'avant',
	'AFTER': 'après',
	'ERROR_DELETING_TRY_AGAIN': 'Erreur pendant la suppression. Réessayez.',
	'LBL_ENTER_WINDOW_TITLE': 'Saisissez un nom de fenêtre.',
	'LBL_SELECT_ONLY_FIELDS': 'Choisissez seulement 2 champs.',
	'LBL_ENTER_RSS_URL':'Saisissez une adresse de flux RSS',
	'LBL_ADD_HOME_WIDGET': 'Impossible d\'ajouter ce bloc! Réessayez',

	'LBL_DEFAULT_VALUE_FOR_THIS_FIELD' : 'Valeur par défaut pour ce champ',

	'RECIPIENTS_CANNOT_BE_EMPTY' : 'Les destinataires sélectionnés ne peuvent être vide',
	'VALID_SCANNER_NAME' : 'Saisissez un nom de boite mail valide (seulement des caractères alphanumériques)',
	'ERR_SAME_SOURCE_AND_TARGET' : 'La source et la destination doivent être différentes',
	'ERR_ATLEAST_ONE_VALUE_FOR' : 'Sélectionnez au moins une valeur pour ',
	'ERR_SELECT_MODULE_FOR_DEPENDENCY' : 'Sélectionnez un module pour ajouter la dépendance',

	'LBL_SIZE_SHOULDNOTBE_GREATER':'La taille du fichier ne doit pas être supérieure à ', //added for upload error message
	'LBL_MAX_SIZE':'La taille maximum de chargement est de', //added for display file size limit
	'LBL_FILESIZEIN_MB':'Mo', // added to show filesize limit in MB
	'LBL_FILESIZEIN_KB':'Ko', // added to show filesize limit in KB
	'LBL_FILESIZEIN_B':'o', // added to show filesize limit in B
	//Contexual help page
	'LBL_HELP_TITLE' : 'Aide',
	'LBL_WIKI_TITLE' : 'Manuels',
	'LBL_FAQ_TITLE'   : 'FAQ',
	'LBL_VIDEO_TITLE' : 'Video',
	'LBL_CLOSE_TITLE' : 'Fermer',
	'LBL_SELECT':'Choisir les widgets visibles par défaut',

	'ERR_SELECT_ATLEAST_ONE_MERGE_CRITERIA_FIELD' : 'Choisir au moins un champ de fusion',
	'ERR_PLEASE_MAP_MANDATORY_FIELDS' : 'Veuillez mapper les champs obligatoires suivants',
	'ERR_MAP_NAME_ALREADY_EXISTS' : 'Le nom de mapping existe déjà. Veuillez modifier',
	'ERR_MAP_NAME_CANNOT_BE_EMPTY' : 'Le nom de mapping ne peut être vide.',
	'ERR_FIELDS_MAPPED_MORE_THAN_ONCE' : 'Les champs suivants sont mappés plus d\'une fois, veuillez modifier.',
	'LBL_MERGE_SHOULDHAVE_INFO' : 'Sélectionnez au moins un champ pour fusionner vos critères',
	'MAP_NAME_EXISTS' : 'Ce nom existe déjà. \\n Voulez-vous écraser ?',
	'MAP_DELETED_INFO' : 'Ce mapping a été supprimé. Il est maintenant inutilisable',

	//error messages for lead conversion
	'ERR_SELECT_EITHER':'Choisir un compte ou un contact lors de la conversion du prospect',
	'ERR_SELECT_ACCOUNT':'Choisir un compte',
	'ERR_SELECT_CONTACT':'Choisir un contact',
	'ERR_MANDATORY_FIELD_VALUE':'Veuillez renseigner les valeurs obligatoires',
	'ERR_POTENTIAL_AMOUNT':'Le montant de l\'affaire doit être un nombre',
	'ERR_EMAILID':'Saisir un email valide',
	'ERR_TRANSFER_TO_ACC':'Le compte doit être choisi pour transférer les informations connexes',
	'ERR_TRANSFER_TO_CON':'Le contact doit être choisi pour transférer les informations connexes ',
	'SURE_TO_DELETE_CUSTOM_MAP':'Etes vous sur de vouloir supprimmer le mapping?',
	'LBL_CLOSE_DATE':'Date d\'échéance',
	'LBL_EMAIL':'Email',
	'MORE_THAN_500' : 'Vous avez sélectionné plus de 500 enregistrements. Cette opération peut prendre du temps. Etes vous sur de continuer?',
	'LBL_MAPPEDALERT':'Le champ est déjà mappé',
	'LBL_REPORT_NAME': 'Merci de saisir un nom pour le nouveau rapport.',
	'LBL_REPORT_NAME_ERROR': 'Vous devez donner un nouveau nom au rapport.',
	'LBL_IS' : 'est',
	'LBL_CONTAINS': 'contient',
	'LBL_DOES_NOT_CONTAIN' : 'ne contient pas',
	'LBL_STARTS_WITH' : 'commence par',
	'LBL_ENDS_WITH' : 'termine par',
	'LBL_HAS_CHANGED' : 'a changé',
	'LBL_HAS_CHANGED_TO' : 'a changé à',
	'LBL_WAS' : 'was',
	'LBL_MONTHDAY' : 'month-day',
	'LBL_IS_EMPTY': 'est vide',
	'LBL_IS_NOT_EMPTY' : 'n\'est pas vide',
	'LBL_EQUAL_TO' : 'égal à',
	'LBL_LESS_THAN' : 'inférieur à',
	'LBL_GREATER_THAN' : 'supérieur à',
	'LBL_DOEST_NOT_EQUAL' : 'n\'est pas égal',
	'LBL_LESS_THAN_OR_EQUAL_TO' : 'inférieur ou égale à',
	'LBL_GREATER_THAN_OR_EQUAL_TO' : 'supérieur ou égal à',
	'LBL_IS_NOT' : 'n\'est pas',
	'LBL_BETWEEN' : 'entre',
	'LBL_BEFORE' : 'avant',
	'LBL_AFTER' : 'après',
	'LBL_IS_TODAY' : 'est aujourd\'hui',
	'LBL_LESS_THAN_DAYS_AGO' : 'moins de x jours',
	'LBL_MORE_THAN_DAYS_AGO' : 'plus de x jours',
	'LBL_IN_LESS_THAN' : 'est moins de',
	'LBL_IN_MORE_THAN' : 'est plus de',
	'LBL_DAYS_AGO' : 'il y a x jours',
	'LBL_DAYS_LATER' : 'x jours après',
	'LBL_LESS_THAN_HOURS_BEFORE' : 'moins de x heures avant',
	'LBL_LESS_THAN_HOURS_LATER' : 'moins de x heures après',
	'LBL_MORE_THAN_HOURS_BEFORE' : 'plus de x heures avant',
	'LBL_MORE_THAN_HOURS_LATER' : 'plus de x heures après',
	'LBL_EXISTS' : 'existe',
	'MAXIMUM_OF_MODULES_PERMITTED' : 'You have reached the maximum of modules that are permitted.',
	'ONLY_ONE_MODULE_PERMITTED_FOR_REPORT' : 'You can select only one related module for this type of report',
	'MUST_SELECT_ONE_MODULE_FOR_REPORT' : 'Vous devez choisir un module lié pour ce type de rapport',
	'LBL_NEW_CONDITION' : 'Nouvelle condition',
	'LBL_NEW_CONDITION_GROUP_BUTTON_LABEL' : 'Nouveau groupe de condition',
	'WF_UPDATE_MAP_ERROR' : '**ERREUR**: Cette tâche utilise un champ qui n\'existe pas: ',
	'WF_UPDATE_MAP_ERROR_INFO' : 'Cette tâche chargera avec des paramètres erronés afin que vous puissiez la réparer. Les valeurs affichées ne sont pas CORRECTES!!',
	'MoveUp' : 'Descendre',
	'MoveDown' : 'Monter',
	'Products' : 'Produits',
	'Services' : 'Services',
	'LBL_Hide' : 'Cacher',
	'LBL_Show' : 'Montrer',
	'ERR_INVALID_DATE_FORMAT' : 'Le format de la date doit être: jj-mm-aaaa',
	'ERR_INVALID_MONTH' : 'Veuillez saisir un mois correct.',
	'ERR_INVALID_DAY' : 'Veuillez saisir un jour correct.',
	'ERR_INVALID_YEAR' : 'Veuillez saisir une année correcte sur 4 chiffres.',
	'ERR_INVALID_DATE' : 'Veuillez saisir une date correcte.',
	'ERR_INVALID_HOUR' : 'Veuillez saisir une heure correcte.',
	'ERR_INVALID_TIME' : 'Veuillez saisir un horaire correct.',
	'ERR_EMAIL_WITH_NO_SUBJECT' : 'Vous n\'avez pas fourni de sujet pour cet email. Si vous voulez en fournir un, vous pouvez le faire maintenant',
	'EMAIL_WITH_NO_SUBJECT' : '(sans-subjet)',
	'INTEGERVALS':'Seul des nombres entiers sont autorisés',
	'JSLBL_Delete': 'Supprimer',
	'JSLBL_Edit': 'Edit',
	'JSLBL_Loading': 'Chargement',
	'JSLBL_ATTACHMENT_NOT_DELETED': 'Le fichier joint ne peut être supprimé',
	'JSLBL_FILEUPLOAD_LIMIT_EXCEEDED': 'Taille limite de fichier dépassée!!',
	'JSLBL_CANCEL': 'Cancel',
	'JSLBL_SAVEAS': 'Save as',
	'JSLBL_SAVE': 'Save',
	'JSLBL_PREVIOUS': 'Previous',
	'JSLBL_NEXT': 'Next',
	'JSLBL_CURRENT': 'current step:',
	'JSLBL_PAGINATION': 'Pagination',
	'JSLBL_FINISH': 'Finish',
	'SHOWING' : 'Showing',
	'OF' : 'of',
	'ERR_Massedit' : 'Error on Mass Edit',
	'ProcessFINISHED' : 'Process Finished',
	'duplicatednotallowed' : 'Duplicated Modules Not Allowed',
	'HAS_THIS_AS_NTH_CHILD' : 'A cet enfant comme un autre',
	'Okay': 'Okay',
	'Failed': 'Failed',
	'Warning': 'Warning',
	'Copied': 'Copied',
	'ERR_PASSWORD_NOT_CHANGED': 'L\'ancien et le nouveau mot de passe sont les mêmes. Veuillez utiliser un mot de passe différent.',
	'ERR_ENTER_OLD_PASSWORD': 'Veuillez saisir votre ancien mot de passe.',
	'ERR_ENTER_NEW_PASSWORD': 'Veuillez saisir votre nouveau mot de passe.',
	'PASSWORD REQUIREMENTS NOT MET': 'PASSWORD REQUIREMENTS NOT MET',
	'Old password is incorrect': 'Old password is incorrect!',
	'LBL_OLD_PASSWORD': 'Ancien mot de passe',
	'LBL_NEW_PASSWORD': 'Nouveau mot de passe',
	'PASSWORD REQUIREMENTS': 'PASSWORD REQUIREMENTS',
	'REQUIRED': 'OBLIGATOIRE',
	'Min. 8 characters': 'Min. 8 caractères',
	'Contains3of4': 'LE MOT DE PASSE DOIT RESPECTER AU MOINS 3 DES 4 CONDITIONS SUIVANTES',
	'Min. 1 uppercase': 'Min. 1 lettre majuscule',
	'Min. 1 lowercase': 'Min. 1 lettre minuscule',
	'Min. 1 number': 'Min. 1 caractère numérique',
	'Min. 1 special character': 'Min. 1 caractère spécial ! ? , ; - @ #',
	'LBL_CHANGE_PASSWORD': 'Changer mot de passe',
	'ACT_UNIT_PRICE_MISMATCH': 'Le prix réel de cette devise doit être égal au prix unitaire, mais ce n\'est pas le cas pour ce produit ou service',
	'LBL_MODIFIED': 'Modified',
	'LBL_IMPORT': 'Import',
	'LBL_NO_DATA': 'No Data Found',
	'filterApplied': 'Filter applied',
	'QuickView': 'Quick view',
	'Restore': 'Restore',
	'LBL_SHOW_MORE':'Show More',
	'LBL_SUCCESS': 'Success',
	'LBL_CREATED_SUCCESS': 'Created successfully',
	'LBL_SELECT_COLUMNS': 'Select columns to show in grid',
	'LBL_MATCH_COLUMNS': 'Select columns to match in grid',
	'LBL_MATCH_ERROR': 'You can only match the fields you select to show',
	'ERROR_CREATING_TRY_AGAIN': 'Error while creating. Fields cannot be empty or have a wrong value.',
	'LBL_REQUIRED_FIELDS': 'Please fill all required fields',
	'LBL_ERROR_CREATING': 'Error while creating. Please try again.',
};