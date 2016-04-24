<?PHP
include ('../mysql.php');
require_once "Mail.php";


$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$pieces = explode("/", $actual_link);
$url = $pieces[4];


$query = "SELECT COUNT(*) FROM companies WHERE url = '$url' AND active = 1";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

if ($row[0] == 1){
	$query = "SELECT admin_ID FROM companies WHERE url = '$url' AND active = 1";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$admin_ID = $row[0];
	$submitted = escape_data(htmlspecialchars($_POST['submitted']));
	
	if ($submitted == "yes"){
		$cause = escape_data(htmlspecialchars($_POST['cause']));
		$name = escape_data(htmlspecialchars($_POST['name']));
		
		$query = "INSERT INTO names (name, cause, admin_ID) VALUES ('$name', '$cause', '$admin_ID')";
		$result = mysql_query($query);
		
		print <<<END
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>RBU Share</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="../css/normalize.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/leaguegothic/stylesheet.css">
        <link rel="stylesheet" href="../css/icomoon-rbu/style.css">

        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="../js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
    </head>
    <body class="share-form">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="wrapper">
            <footer class="co-brand">

            </footer>
            <h1 class="title">UPDATED!<br><br>Enter your name and who you gave to <br>and it will appear on the site.</h1>
            <form class="form"  action="donate.php" method = "POST"><input type = "hidden" name = "submitted" value = "yes">
                <input type="text" placeholder="your name" id="name" name="name">
                <select id="cause" name="cause">
                    <option value="" selected> - select - </option>
                     <option value='A Childs Hope Fund'>A Childs Hope Fund</option>
 <option value='A Childs Hope Fund'>A Childs Hope Fund</option>
 <option value='ACCION International'>ACCION International</option>
 <option value='ACTION for Child Protection'>ACTION for Child Protection</option>
 <option value='Adirondack Council'>Adirondack Council</option>
 <option value='Adopt America Network'>Adopt America Network</option>
 <option value='Advocates International'>Advocates International</option>
 <option value='African Medical & Research Foundation (AMREF)'>African Medical & Research Foundation (AMREF)</option>
 <option value='African Wildlife Foundation'>African Wildlife Foundation</option>
 <option value='Africare'>Africare</option>
 <option value='Agricultural Stewardship Association'>Agricultural Stewardship Association</option>
 <option value='Aid to Children, Youth and Families'>Aid to Children, Youth and Families</option>
 <option value='AIDS Community Research Initiative of America'>AIDS Community Research Initiative of America</option>
 <option value='AIDS Research Alliance of America'>AIDS Research Alliance of America</option>
 <option value='AIDS Research Foundation (amfAR)'>AIDS Research Foundation (amfAR)</option>
 <option value='Alcoholism Council of N Y, Inc'>Alcoholism Council of N Y, Inc</option>
 <option value='Alliance Defending Freedom'>Alliance Defending Freedom</option>
 <option value='Alliance for a Healthier Generation'>Alliance for a Healthier Generation</option>
 <option value='Alpha-1 Foundation'>Alpha-1 Foundation</option>
 <option value='ALS Association, The'>ALS Association, The</option>
 <option value='ALS Regional Center, New York'>ALS Regional Center, New York</option>
 <option value='Alzheimers and Aging Research Center'>Alzheimers and Aging Research Center</option>
 <option value='Alzheimers Association'>Alzheimers Association</option>
 <option value='AMC Cancer Fund'>AMC Cancer Fund</option>
 <option value='Amen Foundation, The'>Amen Foundation, The</option>
 <option value='American Academy for Cerebral Palsy and Developmental Medicine'>American Academy for Cerebral Palsy and Developmental Medicine</option>
 <option value='American Association of Diabetes Educators Education & Research Foundation'>American Association of Diabetes Educators Education & Research Foundation</option>
 <option value='American Cancer Society '>American Cancer Society </option>
 <option value='American Campaign for Prevention of Child Abuse and Family Violence'>American Campaign for Prevention of Child Abuse and Family Violence</option>
 <option value='American Center for Law and Justice'>American Center for Law and Justice</option>
 <option value='American Civil Liberties Union Foundation'>American Civil Liberties Union Foundation</option>
 <option value='American College of Rheumatology Research and Education Foundation'>American College of Rheumatology Research and Education Foundation</option>
 <option value='American Council of the Blind'>American Council of the Blind</option>
 <option value='American Diabetes Association'>American Diabetes Association</option>
 <option value='American Family Association'>American Family Association</option>
 <option value='American Farmland Trust'>American Farmland Trust</option>
 <option value='American Forests'>American Forests</option>
 <option value='American Foundation for Suicide Prevention'>American Foundation for Suicide Prevention</option>
 <option value='American Hearing Research Foundation'>American Hearing Research Foundation</option>
 <option value='American Himalayn Foundation'>American Himalayn Foundation</option>
 <option value='American Jewish World Service'>American Jewish World Service</option>
 <option value='American Kidney Fund'>American Kidney Fund</option>
 <option value='American Liver Foundation'>American Liver Foundation</option>
 <option value='American Lung Association'>American Lung Association</option>
 <option value='American Lung Association of New York'>American Lung Association of New York</option>
 <option value='American Near East Refugee Aid (ANERA)'>American Near East Refugee Aid (ANERA)</option>
 <option value='American Parkinson Disease Association'>American Parkinson Disease Association</option>
 <option value='American Red Cross'>American Red Cross</option>
 <option value='American Refugee Committee'>American Refugee Committee</option>
 <option value='American Rivers'>American Rivers</option>
 <option value='American Society for the Prevention of Cruelty to Animals'>American Society for the Prevention of Cruelty to Animals</option>
 <option value='AmeriCares'>AmeriCares</option>
 <option value='Amnesty International USA'>Amnesty International USA</option>
 <option value='Arbor Day Foundation'>Arbor Day Foundation</option>
 <option value='Arc of Onondaga, New York'>Arc of Onondaga, New York</option>
 <option value='Arthritis & Chronic Pain Research Institute'>Arthritis & Chronic Pain Research Institute</option>
 <option value='Arthritis Foundation'>Arthritis Foundation</option>
 <option value='Arthritis Foundation, New York, Northeast Region'>Arthritis Foundation, New York, Northeast Region</option>
 <option value='Ashoka'>Ashoka</option>
 <option value='Asian American Legal Defense and Education Fund'>Asian American Legal Defense and Education Fund</option>
 <option value='Asthma and Allergy Foundation of America'>Asthma and Allergy Foundation of America</option>
 <option value='Audubon New York'>Audubon New York</option>
 <option value='Autism Speaks'>Autism Speaks</option>
 <option value='Awana Clubs International'>Awana Clubs International</option>
 <option value='Back on My Feet'>Back on My Feet</option>
 <option value='Be The Match Foundation'>Be The Match Foundation</option>
 <option value='Beyond Pesticides'>Beyond Pesticides</option>
 <option value='Bible League International'>Bible League International</option>
 <option value='Biblica'>Biblica</option>
 <option value='Billy Graham Evangelistic Association'>Billy Graham Evangelistic Association</option>
 <option value='Black Womens Health Imperative'>Black Womens Health Imperative</option>
 <option value='Blessings International'>Blessings International</option>
 <option value='Boy Scouts of America'>Boy Scouts of America</option>
 <option value='Breast Cancer Coalition'>Breast Cancer Coalition</option>
 <option value='Breast Cancer Research Foundation, The'>Breast Cancer Research Foundation, The</option>
 <option value='Buffalo Olmsted Parks Conservancy'>Buffalo Olmsted Parks Conservancy</option>
 <option value='CampInteractive'>CampInteractive</option>
 <option value='Cancer Immunology Research Foundation'>Cancer Immunology Research Foundation</option>
 <option value='Cancer Research and Prevention Foundation (Prevent Cancer Foundation)'>Cancer Research and Prevention Foundation (Prevent Cancer Foundation)</option>
 <option value='Cancer Research for Children - CureSearch (National Childhood Cancer Foundation)'>Cancer Research for Children - CureSearch (National Childhood Cancer Foundation)</option>
 <option value='Cancer Research Institute'>Cancer Research Institute</option>
 <option value='Canine Partners for Life'>Canine Partners for Life</option>
 <option value='CARE'>CARE</option>
 <option value='Care Net'>Care Net</option>
 <option value='CaringBridge'>CaringBridge</option>
 <option value='Catholics United for Life'>Catholics United for Life</option>
 <option value='Center for Disability Services, New York'>Center for Disability Services, New York</option>
 <option value='Center for Health, Environment and Justice'>Center for Health, Environment and Justice</option>
 <option value='Cerebral Palsy International Research Foundation'>Cerebral Palsy International Research Foundation</option>
 <option value='Charity:Water'>Charity:Water</option>
 <option value='Child Abuse Intervention Fund'>Child Abuse Intervention Fund</option>
 <option value='Child Aid'>Child Aid</option>
 <option value='Childs Play'>Childs Play</option>
 <option value='Childcare Worldwide'>Childcare Worldwide</option>
 <option value='ChildFund International'>ChildFund International</option>
 <option value='Children Affected by AIDS Foundation'>Children Affected by AIDS Foundation</option>
 <option value='Children International'>Children International</option>
 <option value='Childrens Cancer Assistance Fund'>Childrens Cancer Assistance Fund</option>
 <option value='Childrens Food Fund/World Emergency Relief'>Childrens Food Fund/World Emergency Relief</option>
 <option value='Childrens Heart Foundation, The'>Childrens Heart Foundation, The</option>
 <option value='Childrens HopeChest'>Childrens HopeChest</option>
 <option value='Childrens Hospital'>Childrens Hospital</option>
 <option value='Childrens Hunger Relief Fund'>Childrens Hunger Relief Fund</option>
 <option value='Childrens Miracle Network Hospitals'>Childrens Miracle Network Hospitals</option>
 <option value='Childrens Rights'>Childrens Rights</option>
 <option value='Childrens Tumor Foundation'>Childrens Tumor Foundation</option>
 <option value='Christian Appalachian Project'>Christian Appalachian Project</option>
 <option value='Christian Blind Mission'>Christian Blind Mission</option>
 <option value='Christian Foundation for Children and Aging'>Christian Foundation for Children and Aging</option>
 <option value='Christian Legal Society'>Christian Legal Society</option>
 <option value='Christian Military Fellowship'>Christian Military Fellowship</option>
 <option value='Christian Reformed World Relief Committee (CRWRC)'>Christian Reformed World Relief Committee (CRWRC)</option>
 <option value='Christian Relief Fund'>Christian Relief Fund</option>
 <option value='Christopher and Dana Reeve Foundation'>Christopher and Dana Reeve Foundation</option>
 <option value='Church World Service/CROP'>Church World Service/CROP</option>
 <option value='Citizens Campaign Fund for the Environment'>Citizens Campaign Fund for the Environment</option>
 <option value='City of Hope'>City of Hope</option>
 <option value='City Year'>City Year</option>
 <option value='Clean Water Fund'>Clean Water Fund</option>
 <option value='Clearwater (Hudson River Sloop Clearwater, Inc.)'>Clearwater (Hudson River Sloop Clearwater, Inc.)</option>
 <option value='Club Beyond/Military Community Youth Ministries'>Club Beyond/Military Community Youth Ministries</option>
 <option value='Colon Cancer Alliance'>Colon Cancer Alliance</option>
 <option value='Community Health Charities of New York'>Community Health Charities of New York</option>
 <option value='Compassion International'>Compassion International</option>
 <option value='Conservation International'>Conservation International</option>
 <option value='Cooleys Anemia Foundation'>Cooleys Anemia Foundation</option>
 <option value='Crohns & Colitis Foundation of America, New York, Long Island Chapter'>Crohns & Colitis Foundation of America, New York, Long Island Chapter</option>
 <option value='Crohns & Colitis Foundation of America'>Crohns & Colitis Foundation of America</option>
 <option value='Cystic Fibrosis Foundation'>Cystic Fibrosis Foundation</option>
 <option value='Defenders of Wildlife'>Defenders of Wildlife</option>
 <option value='Depression and Bipolar Support Alliance'>Depression and Bipolar Support Alliance</option>
 <option value='Diabetes National Research Group'>Diabetes National Research Group</option>
 <option value='Diabetes Research and Wellness Foundation'>Diabetes Research and Wellness Foundation</option>
 <option value='Diabetes Research Institute Foundation, Inc.'>Diabetes Research Institute Foundation, Inc.</option>
 <option value='Disabled and Alone/Life Services for the Handicapped'>Disabled and Alone/Life Services for the Handicapped</option>
 <option value='Doctors Without Borders'>Doctors Without Borders</option>
 <option value='Donors Choose'>Donors Choose</option>
 <option value='Double H Ranch, New York'>Double H Ranch, New York</option>
 <option value='Dress for Success Worldwide'>Dress for Success Worldwide</option>
 <option value='Dystrophic Epidermolysis Bullosa Research Association of America'>Dystrophic Epidermolysis Bullosa Research Association of America</option>
 <option value='Earth Day New York'>Earth Day New York</option>
 <option value='Earthjustice'>Earthjustice</option>
 <option value='EarthShare New York'>EarthShare New York</option>
 <option value='East End Hospice, New York'>East End Hospice, New York</option>
 <option value='Easter Seals'>Easter Seals</option>
 <option value='Easter Seals, New York, NYC'>Easter Seals, New York, NYC</option>
 <option value='ECHO'>ECHO</option>
 <option value='Endometriosis Association'>Endometriosis Association</option>
 <option value='EngenderHealth'>EngenderHealth</option>
 <option value='Environment America Research and Policy Center'>Environment America Research and Policy Center</option>
 <option value='Environmental Advocates of New York'>Environmental Advocates of New York</option>
 <option value='Environmental and Energy Study Institute'>Environmental and Energy Study Institute</option>
 <option value='Environmental Defense Fund'>Environmental Defense Fund</option>
 <option value='Environmental Law Institute'>Environmental Law Institute</option>
 <option value='Epilepsy Foundation of America'>Epilepsy Foundation of America</option>
 <option value='Epilepsy Society of Southern New York'>Epilepsy Society of Southern New York</option>
 <option value='Episcopal Relief & Development'>Episcopal Relief & Development</option>
 <option value='Family Research Council'>Family Research Council</option>
 <option value='Father Flanagans Boys Home'>Father Flanagans Boys Home</option>
 <option value='Feed My Starving Children'>Feed My Starving Children</option>
 <option value='Feed The Children'>Feed The Children</option>
 <option value='Feeding America'>Feeding America</option>
 <option value='Fellowship of Christian Athletes'>Fellowship of Christian Athletes</option>
 <option value='FINCA International'>FINCA International</option>
 <option value='Finger Lakes Land Trust'>Finger Lakes Land Trust</option>
 <option value='Focus on the Family'>Focus on the Family</option>
 <option value='Food for the Hungry'>Food for the Hungry</option>
 <option value='Foster Care To Success Foundation'>Foster Care To Success Foundation</option>
 <option value='Foundation Fighting Blindness'>Foundation Fighting Blindness</option>
 <option value='Foundation of the American Thoracic Society'>Foundation of the American Thoracic Society</option>
 <option value='Freedom From Hunger'>Freedom From Hunger</option>
 <option value='Friends of Oswego County Hospice, Inc., New York'>Friends of Oswego County Hospice, Inc., New York</option>
 <option value='Friends of the Earth'>Friends of the Earth</option>
 <option value='Gateway for Cancer Research'>Gateway for Cancer Research</option>
 <option value='Gay, Lesbian, Bisexual & Transgender Scholarship Fund - Point Foundation'>Gay, Lesbian, Bisexual & Transgender Scholarship Fund - Point Foundation</option>
 <option value='Give Kids The World'>Give Kids The World</option>
 <option value='GiveDirectly'>GiveDirectly</option>
 <option value='Glaucoma Research Foundation'>Glaucoma Research Foundation</option>
 <option value='Global Impact'>Global Impact</option>
 <option value='Good Shepherd Hospice, New York'>Good Shepherd Hospice, New York</option>
 <option value='Goodwill Industries International, Inc.'>Goodwill Industries International, Inc.</option>
 <option value='Group for the East End'>Group for the East End</option>
 <option value='Guide Dog Foundation for the Blind, Inc.'>Guide Dog Foundation for the Blind, Inc.</option>
 <option value='Harlem Hospital Sickle Cell Center, New York'>Harlem Hospital Sickle Cell Center, New York</option>
 <option value='Health Volunteers Overseas'>Health Volunteers Overseas</option>
 <option value='Heifer International'>Heifer International</option>
 <option value='Helen Keller International'>Helen Keller International</option>
 <option value='High Peaks Hospice and Palliative Care, New York, Queensbury'>High Peaks Hospice and Palliative Care, New York, Queensbury</option>
 <option value='Home School Foundation'>Home School Foundation</option>
 <option value='Hope Heart Institute'>Hope Heart Institute</option>
 <option value='Hospicare & Palliative Care Services, New York'>Hospicare & Palliative Care Services, New York</option>
 <option value='Hospice America (American Hospice Foundation)'>Hospice America (American Hospice Foundation)</option>
 <option value='Hospice and Palliative Care Association of NYS'>Hospice and Palliative Care Association of NYS</option>
 <option value='Hospice and Palliative Care of Westchester, New York'>Hospice and Palliative Care of Westchester, New York</option>
 <option value='Hospice Care Network, New York'>Hospice Care Network, New York</option>
 <option value='Hospice Inc., New York'>Hospice Inc., New York</option>
 <option value='Hospice of Central New York'>Hospice of Central New York</option>
 <option value='Human Rights Campaign Foundation'>Human Rights Campaign Foundation</option>
 <option value='Humane Ohio'>Humane Ohio</option>
 <option value='Huntingtons Disease Society of America'>Huntingtons Disease Society of America</option>
 <option value='I Have A Dream Foundation'>I Have A Dream Foundation</option>
 <option value='International Christian Concern'>International Christian Concern</option>
 <option value='International Executive Service Corps'>International Executive Service Corps</option>
 <option value='International Eye Foundation'>International Eye Foundation</option>
 <option value='International Medical Corps'>International Medical Corps</option>
 <option value='International Orthodox Christian Charities'>International Orthodox Christian Charities</option>
 <option value='International Planned Parenthood Federation, Western Hemisphere Region'>International Planned Parenthood Federation, Western Hemisphere Region</option>
 <option value='International Relief Teams'>International Relief Teams</option>
 <option value='International Rescue Committee'>International Rescue Committee</option>
 <option value='International Youth Foundation'>International Youth Foundation</option>
 <option value='Interstitial Cystitis Association'>Interstitial Cystitis Association</option>
 <option value='Izaak Walton League of America'>Izaak Walton League of America</option>
 <option value='JAARS'>JAARS</option>
 <option value='John Wayne Cancer Institute'>John Wayne Cancer Institute</option>
 <option value='Junior Achievement USA'>Junior Achievement USA</option>
 <option value='Juvenile Diabetes Research Foundation International'>Juvenile Diabetes Research Foundation International</option>
 <option value='Khan Academy'>Khan Academy</option>
 <option value='Kids for the Kingdom'>Kids for the Kingdom</option>
 <option value='Lance Armstrong Foundation'>Lance Armstrong Foundation</option>
 <option value='Land Trust Alliance'>Land Trust Alliance</option>
 <option value='Latino Youth Education Fund'>Latino Youth Education Fund</option>
 <option value='LatinoJustice PRLDEF'>LatinoJustice PRLDEF</option>
 <option value='Lets Cure CP'>Lets Cure CP</option>
 <option value='Leukemia & Lymphoma Society'>Leukemia & Lymphoma Society</option>
 <option value='Leukemia Research Foundation'>Leukemia Research Foundation</option>
 <option value='Lions Clubs International Foundation'>Lions Clubs International Foundation</option>
 <option value='LUNGevity Foundation'>LUNGevity Foundation</option>
 <option value='Lupus Alliance of America, New York, Hudson Valley N Y Affiliate'>Lupus Alliance of America, New York, Hudson Valley N Y Affiliate</option>
 <option value='Lupus Alliance of America, New York, Long Island/Queens Affiliate'>Lupus Alliance of America, New York, Long Island/Queens Affiliate</option>
 <option value='Lupus Alliance of America, New York, Southern Tier Affiliate'>Lupus Alliance of America, New York, Southern Tier Affiliate</option>
 <option value='Lupus Foundation of America'>Lupus Foundation of America</option>
 <option value='Lupus Foundation of Genesee Valley NY, Inc.'>Lupus Foundation of Genesee Valley NY, Inc.</option>
 <option value='Lupus Foundation of Mid & Northern New York'>Lupus Foundation of Mid & Northern New York</option>
 <option value='Lupus Research Institute, New York'>Lupus Research Institute, New York</option>
 <option value='Lutheran World Relief'>Lutheran World Relief</option>
 <option value='Lymphatic Research Foundation, Inc., New York'>Lymphatic Research Foundation, Inc., New York</option>
 <option value='Make-A-Wish Foundation® of America'>Make-A-Wish Foundation® of America</option>
 <option value='March of Dimes Foundation'>March of Dimes Foundation</option>
 <option value='MAZON: A Jewish Response to Hunger'>MAZON: A Jewish Response to Hunger</option>
 <option value='Meals On Wheels Association of America'>Meals On Wheels Association of America</option>
 <option value='Melanoma Research Foundation'>Melanoma Research Foundation</option>
 <option value='Memorial Sloan-Kettering Cancer Center, New York'>Memorial Sloan-Kettering Cancer Center, New York</option>
 <option value='Mental Health America (formerly National Mental Health Association)'>Mental Health America (formerly National Mental Health Association)</option>
 <option value='Mental Health America of New York, New York State'>Mental Health America of New York, New York State</option>
 <option value='Mercy Corps'>Mercy Corps</option>
 <option value='Mercy Ships'>Mercy Ships</option>
 <option value='Metropolitan Jewish Health System, New York'>Metropolitan Jewish Health System, New York</option>
 <option value='Mexican Medical'>Mexican Medical</option>
 <option value='Millennium Promise'>Millennium Promise</option>
 <option value='Mission Aviation Fellowship'>Mission Aviation Fellowship</option>
 <option value='Mission to Children'>Mission to Children</option>
 <option value='Mission: Readiness'>Mission: Readiness</option>
 <option value='Missionary Athletes International'>Missionary Athletes International</option>
 <option value='Moody Bible Institute'>Moody Bible Institute</option>
 <option value='MOPS International'>MOPS International</option>
 <option value='Mothers Against Drunk Driving'>Mothers Against Drunk Driving</option>
 <option value='Multiple Sclerosis Association of America'>Multiple Sclerosis Association of America</option>
 <option value='Multiple Sclerosis National Research Institute'>Multiple Sclerosis National Research Institute</option>
 <option value='Muscular Dystrophy Association'>Muscular Dystrophy Association</option>
 <option value='Myasthenia Gravis Foundation of America'>Myasthenia Gravis Foundation of America</option>
 <option value='Myasthenia Gravis Foundation of America, New York, Upstate NY Chapter'>Myasthenia Gravis Foundation of America, New York, Upstate NY Chapter</option>
 <option value='Myasthenia Gravis Foundation of Greater New York'>Myasthenia Gravis Foundation of Greater New York</option>
 <option value='NAACP Legal Defense and Educational Fund'>NAACP Legal Defense and Educational Fund</option>
 <option value='NAACP Special Contribution Fund'>NAACP Special Contribution Fund</option>
 <option value='NAMI (National Alliance on Mental Illness)'>NAMI (National Alliance on Mental Illness)</option>
 <option value='NARAL Pro-Choice America Foundation'>NARAL Pro-Choice America Foundation</option>
 <option value='National Association of the Deaf'>National Association of the Deaf</option>
 <option value='National Black Child Development Institute'>National Black Child Development Institute</option>
 <option value='National Brain Tumor Society'>National Brain Tumor Society</option>
 <option value='National Council on Alcoholism & Drug Dependence (NCADD)'>National Council on Alcoholism & Drug Dependence (NCADD)</option>
 <option value='National Day of Prayer Task Force'>National Day of Prayer Task Force</option>
 <option value='National Down Syndrome Society'>National Down Syndrome Society</option>
 <option value='National Eating Disorders Association'>National Eating Disorders Association</option>
 <option value='National Fish and Wildlife Foundation'>National Fish and Wildlife Foundation</option>
 <option value='National Headache Foundation'>National Headache Foundation</option>
 <option value='National Hemophilia Foundation'>National Hemophilia Foundation</option>
 <option value='National Hospice and Palliative Care Organization'>National Hospice and Palliative Care Organization</option>
 <option value='National Kidney Foundation'>National Kidney Foundation</option>
 <option value='National Kidney Foundation of Central New York, Inc.'>National Kidney Foundation of Central New York, Inc.</option>
 <option value='National Kidney Foundation of New York, Serving Greater New York'>National Kidney Foundation of New York, Serving Greater New York</option>
 <option value='National Kidney Foundation of New York, Western New York'>National Kidney Foundation of New York, Western New York</option>
 <option value='National Law Enforcement Officers Memorial Fund'>National Law Enforcement Officers Memorial Fund</option>
 <option value='National Marfan Foundation'>National Marfan Foundation</option>
 <option value='National Multiple Sclerosis Society'>National Multiple Sclerosis Society</option>
 <option value='National Multiple Sclerosis Society, New York, New York City/Southern New York Chapter'>National Multiple Sclerosis Society, New York, New York City/Southern New York Chapter</option>
 <option value='National Multiple Sclerosis Society, New York, New York City/Southern NY Chapter'>National Multiple Sclerosis Society, New York, New York City/Southern NY Chapter</option>
 <option value='National Multiple Sclerosis Society, New York, Upstate NY Chapter, Albany'>National Multiple Sclerosis Society, New York, Upstate NY Chapter, Albany</option>
 <option value='National Multiple Sclerosis Society, New York, Western New York Chapter'>National Multiple Sclerosis Society, New York, Western New York Chapter</option>
 <option value='National Organization for Rare Disorders (NORD)'>National Organization for Rare Disorders (NORD)</option>
 <option value='National Parkinson Foundation'>National Parkinson Foundation</option>
 <option value='National Parks Conservation Association'>National Parks Conservation Association</option>
 <option value='National Psoriasis Foundation'>National Psoriasis Foundation</option>
 <option value='National Right to Life Educational Trust Fund'>National Right to Life Educational Trust Fund</option>
 <option value='National Spinal Cord Injury Association'>National Spinal Cord Injury Association</option>
 <option value='National Spinal Cord Injury Association, Greater N Y Chapter'>National Spinal Cord Injury Association, Greater N Y Chapter</option>
 <option value='National Stroke Association'>National Stroke Association</option>
 <option value='National Trust for Historic Preservation in the United States'>National Trust for Historic Preservation in the United States</option>
 <option value='National Wildlife Federation'>National Wildlife Federation</option>
 <option value='Native American Rights Fund'>Native American Rights Fund</option>
 <option value='Natural Resources Defense Council of New York'>Natural Resources Defense Council of New York</option>
 <option value='Navigators, The'>Navigators, The</option>
 <option value='Nazarene Compassionate Ministries, Inc.'>Nazarene Compassionate Ministries, Inc.</option>
 <option value='Near East Foundation'>Near East Foundation</option>
 <option value='NetHope'>NetHope</option>
 <option value='New York Botanical Garden'>New York Botanical Garden</option>
 <option value='New York League of Conservation Voters Education Fund'>New York League of Conservation Voters Education Fund</option>
 <option value='New York Needs You (NYNY)'>New York Needs You (NYNY)</option>
 <option value='New York Public Interest Research Group Fund'>New York Public Interest Research Group Fund</option>
 <option value='New York Restoration Project'>New York Restoration Project</option>
 <option value='New York-New Jersey Trail Conference'>New York-New Jersey Trail Conference</option>
 <option value='New Yorkers for Parks'>New Yorkers for Parks</option>
 <option value='Northeast Kidney Foundation'>Northeast Kidney Foundation</option>
 <option value='Nurse-Family Partnership'>Nurse-Family Partnership</option>
 <option value='Ocean Conservancy'>Ocean Conservancy</option>
 <option value='Oceana Inc.'>Oceana Inc.</option>
 <option value='Officers Christian Fellowship'>Officers Christian Fellowship</option>
 <option value='Open Space Institute'>Open Space Institute</option>
 <option value='Operation Blessing International Relief and Development Corp.'>Operation Blessing International Relief and Development Corp.</option>
 <option value='Operation Smile'>Operation Smile</option>
 <option value='Opportunity International'>Opportunity International</option>
 <option value='Osteogenesis Imperfecta Foundation'>Osteogenesis Imperfecta Foundation</option>
 <option value='Ovarian Cancer Research Fund'>Ovarian Cancer Research Fund</option>
 <option value='Oxfam America'>Oxfam America</option>
 <option value='Pan American Development Foundation'>Pan American Development Foundation</option>
 <option value='Pancreatic Cancer Action Network'>Pancreatic Cancer Action Network</option>
 <option value='Parkinsons Disease Foundation'>Parkinsons Disease Foundation</option>
 <option value='Parks & Trails New York'>Parks & Trails New York</option>
 <option value='Partners In Health'>Partners In Health</option>
 <option value='PATH'>PATH</option>
 <option value='PCI-Media Impact'>PCI-Media Impact</option>
 <option value='Pencils of Promise'>Pencils of Promise</option>
 <option value='Pesticide Action Network North America'>Pesticide Action Network North America</option>
 <option value='PetSmart Charities, Inc.'>PetSmart Charities, Inc.</option>
 <option value='Plan USA'>Plan USA</option>
 <option value='Planned Parenthood Federation of America- International'>Planned Parenthood Federation of America- International</option>
 <option value='Prevent Blindness America (National Society to Prevent Blindness)'>Prevent Blindness America (National Society to Prevent Blindness)</option>
 <option value='Prevent Blindness America, New York, Tri-State'>Prevent Blindness America, New York, Tri-State</option>
 <option value='Prevent Child Abuse America'>Prevent Child Abuse America</option>
 <option value='Prison Fellowship'>Prison Fellowship</option>
 <option value='Prison Fellowship International'>Prison Fellowship International</option>
 <option value='Project HOPE'>Project HOPE</option>
 <option value='Project Sunshine'>Project Sunshine</option>
 <option value='Prostate Cancer Foundation'>Prostate Cancer Foundation</option>
 <option value='Protect the Adirondacks!'>Protect the Adirondacks!</option>
 <option value='Queens Centers for Progress, New York'>Queens Centers for Progress, New York</option>
 <option value='Rails-to-Trails Conservancy'>Rails-to-Trails Conservancy</option>
 <option value='Rainforest Alliance'>Rainforest Alliance</option>
 <option value='Reading Is Fundamental, Inc. (RIF)'>Reading Is Fundamental, Inc. (RIF)</option>
 <option value='Research to Prevent Blindness'>Research to Prevent Blindness</option>
 <option value='Riverkeeper'>Riverkeeper</option>
 <option value='Rockland Council on Alcoholism - New York'>Rockland Council on Alcoholism - New York</option>
 <option value='Rocky Mountain Institute'>Rocky Mountain Institute</option>
 <option value='Ronald McDonald House Charities'>Ronald McDonald House Charities</option>
 <option value='Rotary Foundation of Rotary International'>Rotary Foundation of Rotary International</option>
 <option value='S.L.E. Lupus Foundation, Inc. - New York'>S.L.E. Lupus Foundation, Inc. - New York</option>
 <option value='Salvation Army World Service Office (SAWSO)'>Salvation Army World Service Office (SAWSO)</option>
 <option value='Samaritans Purse'>Samaritans Purse</option>
 <option value='Save the Children'>Save the Children</option>
 <option value='Scenic America'>Scenic America</option>
 <option value='Senior Care Fund'>Senior Care Fund</option>
 <option value='SeriousFun (fka Association of Hole in the Wall Camps)'>SeriousFun (fka Association of Hole in the Wall Camps)</option>
 <option value='Share Our Strength'>Share Our Strength</option>
 <option value='Shepherds Call Inc, The'>Shepherds Call Inc, The</option>
 <option value='Sickle Cell Disease Association of America'>Sickle Cell Disease Association of America</option>
 <option value='SIDS Alliance Long Island Affiliate - New York'>SIDS Alliance Long Island Affiliate - New York</option>
 <option value='SIDS Alliance/First Candle'>SIDS Alliance/First Candle</option>
 <option value='Society of St. Andrew, The'>Society of St. Andrew, The</option>
 <option value='SOS Childrens Villages- USA'>SOS Childrens Villages- USA</option>
 <option value='Southern Poverty Law Center'>Southern Poverty Law Center</option>
 <option value='Spina Bifida Association of America'>Spina Bifida Association of America</option>
 <option value='Spina Bifida Association of New York'>Spina Bifida Association of New York</option>
 <option value='Spina Bifida Resource Network, New York'>Spina Bifida Resource Network, New York</option>
 <option value='St. Jude Childrens Research Hospital'>St. Jude Childrens Research Hospital</option>
 <option value='STANDUP FOR KIDS'>STANDUP FOR KIDS</option>
 <option value='Starlight Childrens Foundation'>Starlight Childrens Foundation</option>
 <option value='Surfrider Foundation'>Surfrider Foundation</option>
 <option value='Susan G. Komen for the Cure'>Susan G. Komen for the Cure</option>
 <option value='Teach For America'>Teach For America</option>
 <option value='TechnoServe'>TechnoServe</option>



                </select>
                <span class="select-icon" data-icon="&#xe002;"></span>
                 <label for="agreement">
                  
                    By clicking submit I understand that this information will appear on screens and websites viewable by my coworkers.
                </label>
                <input type="submit">
            </form>
            <section class="social-media">
                <h2>Tell the world who you gave to.</h2>
                <a href="#" 
  onclick="
    var url='http://raisedby.us/impact/thrillist';
    window.open(
      'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(url), 
      'facebook-share-dialog', 
      'width=626,height=436'); 
    return false;" class="social-media__facebook"><span data-icon="&#xe003;"></span>Share on Facebook</a>
                <a href="https://twitter.com/share?url=http%3A%2F%2Fraisedby.us%2Fimpact%2Fthrillist" class="social-media__twitter"><span data-icon="&#xe004;"></span>Tweet</a>
            </section>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="../js/vendor/jquery.icheck.min.js"></script>
        <script src="../js/main.js"></script>
    </body>
</html>
		
END;

		

	}
	else{
		print <<<END
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>RBU Share</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="../css/normalize.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/leaguegothic/stylesheet.css">
        <link rel="stylesheet" href="../css/icomoon-rbu/style.css">

        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="../js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
    </head>
    <body class="share-form">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="wrapper">
            <footer class="co-brand">

            </footer>
            <h1 class="title">Enter your name and who you gave to <br>and it will appear on the site.</h1>
            <form class="form" action="donate.php" method = "POST"><input type = "hidden" name = "submitted" value = "yes">
                <input type="text" placeholder="your name" id="name" name="name">
                <select id="cause" name="cause">
                    <option value="" selected> - select - </option>
                   <option value='A Childs Hope Fund'>A Childs Hope Fund</option>
  <option value='A Childs Hope Fund'>A Childs Hope Fund</option>
 <option value='ACCION International'>ACCION International</option>
 <option value='ACTION for Child Protection'>ACTION for Child Protection</option>
 <option value='Adirondack Council'>Adirondack Council</option>
 <option value='Adopt America Network'>Adopt America Network</option>
 <option value='Advocates International'>Advocates International</option>
 <option value='African Medical & Research Foundation (AMREF)'>African Medical & Research Foundation (AMREF)</option>
 <option value='African Wildlife Foundation'>African Wildlife Foundation</option>
 <option value='Africare'>Africare</option>
 <option value='Agricultural Stewardship Association'>Agricultural Stewardship Association</option>
 <option value='Aid to Children, Youth and Families'>Aid to Children, Youth and Families</option>
 <option value='AIDS Community Research Initiative of America'>AIDS Community Research Initiative of America</option>
 <option value='AIDS Research Alliance of America'>AIDS Research Alliance of America</option>
 <option value='AIDS Research Foundation (amfAR)'>AIDS Research Foundation (amfAR)</option>
 <option value='Alcoholism Council of N Y, Inc'>Alcoholism Council of N Y, Inc</option>
 <option value='Alliance Defending Freedom'>Alliance Defending Freedom</option>
 <option value='Alliance for a Healthier Generation'>Alliance for a Healthier Generation</option>
 <option value='Alpha-1 Foundation'>Alpha-1 Foundation</option>
 <option value='ALS Association, The'>ALS Association, The</option>
 <option value='ALS Regional Center, New York'>ALS Regional Center, New York</option>
 <option value='Alzheimers and Aging Research Center'>Alzheimers and Aging Research Center</option>
 <option value='Alzheimers Association'>Alzheimers Association</option>
 <option value='AMC Cancer Fund'>AMC Cancer Fund</option>
 <option value='Amen Foundation, The'>Amen Foundation, The</option>
 <option value='American Academy for Cerebral Palsy and Developmental Medicine'>American Academy for Cerebral Palsy and Developmental Medicine</option>
 <option value='American Association of Diabetes Educators Education & Research Foundation'>American Association of Diabetes Educators Education & Research Foundation</option>
 <option value='American Cancer Society '>American Cancer Society </option>
 <option value='American Campaign for Prevention of Child Abuse and Family Violence'>American Campaign for Prevention of Child Abuse and Family Violence</option>
 <option value='American Center for Law and Justice'>American Center for Law and Justice</option>
 <option value='American Civil Liberties Union Foundation'>American Civil Liberties Union Foundation</option>
 <option value='American College of Rheumatology Research and Education Foundation'>American College of Rheumatology Research and Education Foundation</option>
 <option value='American Council of the Blind'>American Council of the Blind</option>
 <option value='American Diabetes Association'>American Diabetes Association</option>
 <option value='American Family Association'>American Family Association</option>
 <option value='American Farmland Trust'>American Farmland Trust</option>
 <option value='American Forests'>American Forests</option>
 <option value='American Foundation for Suicide Prevention'>American Foundation for Suicide Prevention</option>
 <option value='American Hearing Research Foundation'>American Hearing Research Foundation</option>
 <option value='American Himalayn Foundation'>American Himalayn Foundation</option>
 <option value='American Jewish World Service'>American Jewish World Service</option>
 <option value='American Kidney Fund'>American Kidney Fund</option>
 <option value='American Liver Foundation'>American Liver Foundation</option>
 <option value='American Lung Association'>American Lung Association</option>
 <option value='American Lung Association of New York'>American Lung Association of New York</option>
 <option value='American Near East Refugee Aid (ANERA)'>American Near East Refugee Aid (ANERA)</option>
 <option value='American Parkinson Disease Association'>American Parkinson Disease Association</option>
 <option value='American Red Cross'>American Red Cross</option>
 <option value='American Refugee Committee'>American Refugee Committee</option>
 <option value='American Rivers'>American Rivers</option>
 <option value='American Society for the Prevention of Cruelty to Animals'>American Society for the Prevention of Cruelty to Animals</option>
 <option value='AmeriCares'>AmeriCares</option>
 <option value='Amnesty International USA'>Amnesty International USA</option>
 <option value='Arbor Day Foundation'>Arbor Day Foundation</option>
 <option value='Arc of Onondaga, New York'>Arc of Onondaga, New York</option>
 <option value='Arthritis & Chronic Pain Research Institute'>Arthritis & Chronic Pain Research Institute</option>
 <option value='Arthritis Foundation'>Arthritis Foundation</option>
 <option value='Arthritis Foundation, New York, Northeast Region'>Arthritis Foundation, New York, Northeast Region</option>
 <option value='Ashoka'>Ashoka</option>
 <option value='Asian American Legal Defense and Education Fund'>Asian American Legal Defense and Education Fund</option>
 <option value='Asthma and Allergy Foundation of America'>Asthma and Allergy Foundation of America</option>
 <option value='Audubon New York'>Audubon New York</option>
 <option value='Autism Speaks'>Autism Speaks</option>
 <option value='Awana Clubs International'>Awana Clubs International</option>
 <option value='Back on My Feet'>Back on My Feet</option>
 <option value='Be The Match Foundation'>Be The Match Foundation</option>
 <option value='Beyond Pesticides'>Beyond Pesticides</option>
 <option value='Bible League International'>Bible League International</option>
 <option value='Biblica'>Biblica</option>
 <option value='Billy Graham Evangelistic Association'>Billy Graham Evangelistic Association</option>
 <option value='Black Womens Health Imperative'>Black Womens Health Imperative</option>
 <option value='Blessings International'>Blessings International</option>
 <option value='Boy Scouts of America'>Boy Scouts of America</option>
 <option value='Breast Cancer Coalition'>Breast Cancer Coalition</option>
 <option value='Breast Cancer Research Foundation, The'>Breast Cancer Research Foundation, The</option>
 <option value='Buffalo Olmsted Parks Conservancy'>Buffalo Olmsted Parks Conservancy</option>
 <option value='CampInteractive'>CampInteractive</option>
 <option value='Cancer Immunology Research Foundation'>Cancer Immunology Research Foundation</option>
 <option value='Cancer Research and Prevention Foundation (Prevent Cancer Foundation)'>Cancer Research and Prevention Foundation (Prevent Cancer Foundation)</option>
 <option value='Cancer Research for Children - CureSearch (National Childhood Cancer Foundation)'>Cancer Research for Children - CureSearch (National Childhood Cancer Foundation)</option>
 <option value='Cancer Research Institute'>Cancer Research Institute</option>
 <option value='Canine Partners for Life'>Canine Partners for Life</option>
 <option value='CARE'>CARE</option>
 <option value='Care Net'>Care Net</option>
 <option value='CaringBridge'>CaringBridge</option>
 <option value='Catholics United for Life'>Catholics United for Life</option>
 <option value='Center for Disability Services, New York'>Center for Disability Services, New York</option>
 <option value='Center for Health, Environment and Justice'>Center for Health, Environment and Justice</option>
 <option value='Cerebral Palsy International Research Foundation'>Cerebral Palsy International Research Foundation</option>
 <option value='Charity:Water'>Charity:Water</option>
 <option value='Child Abuse Intervention Fund'>Child Abuse Intervention Fund</option>
 <option value='Child Aid'>Child Aid</option>
 <option value='Childs Play'>Childs Play</option>
 <option value='Childcare Worldwide'>Childcare Worldwide</option>
 <option value='ChildFund International'>ChildFund International</option>
 <option value='Children Affected by AIDS Foundation'>Children Affected by AIDS Foundation</option>
 <option value='Children International'>Children International</option>
 <option value='Childrens Cancer Assistance Fund'>Childrens Cancer Assistance Fund</option>
 <option value='Childrens Food Fund/World Emergency Relief'>Childrens Food Fund/World Emergency Relief</option>
 <option value='Childrens Heart Foundation, The'>Childrens Heart Foundation, The</option>
 <option value='Childrens HopeChest'>Childrens HopeChest</option>
 <option value='Childrens Hospital'>Childrens Hospital</option>
 <option value='Childrens Hunger Relief Fund'>Childrens Hunger Relief Fund</option>
 <option value='Childrens Miracle Network Hospitals'>Childrens Miracle Network Hospitals</option>
 <option value='Childrens Rights'>Childrens Rights</option>
 <option value='Childrens Tumor Foundation'>Childrens Tumor Foundation</option>
 <option value='Christian Appalachian Project'>Christian Appalachian Project</option>
 <option value='Christian Blind Mission'>Christian Blind Mission</option>
 <option value='Christian Foundation for Children and Aging'>Christian Foundation for Children and Aging</option>
 <option value='Christian Legal Society'>Christian Legal Society</option>
 <option value='Christian Military Fellowship'>Christian Military Fellowship</option>
 <option value='Christian Reformed World Relief Committee (CRWRC)'>Christian Reformed World Relief Committee (CRWRC)</option>
 <option value='Christian Relief Fund'>Christian Relief Fund</option>
 <option value='Christopher and Dana Reeve Foundation'>Christopher and Dana Reeve Foundation</option>
 <option value='Church World Service/CROP'>Church World Service/CROP</option>
 <option value='Citizens Campaign Fund for the Environment'>Citizens Campaign Fund for the Environment</option>
 <option value='City of Hope'>City of Hope</option>
 <option value='City Year'>City Year</option>
 <option value='Clean Water Fund'>Clean Water Fund</option>
 <option value='Clearwater (Hudson River Sloop Clearwater, Inc.)'>Clearwater (Hudson River Sloop Clearwater, Inc.)</option>
 <option value='Club Beyond/Military Community Youth Ministries'>Club Beyond/Military Community Youth Ministries</option>
 <option value='Colon Cancer Alliance'>Colon Cancer Alliance</option>
 <option value='Community Health Charities of New York'>Community Health Charities of New York</option>
 <option value='Compassion International'>Compassion International</option>
 <option value='Conservation International'>Conservation International</option>
 <option value='Cooleys Anemia Foundation'>Cooleys Anemia Foundation</option>
 <option value='Crohns & Colitis Foundation of America, New York, Long Island Chapter'>Crohns & Colitis Foundation of America, New York, Long Island Chapter</option>
 <option value='Crohns & Colitis Foundation of America'>Crohns & Colitis Foundation of America</option>
 <option value='Cystic Fibrosis Foundation'>Cystic Fibrosis Foundation</option>
 <option value='Defenders of Wildlife'>Defenders of Wildlife</option>
 <option value='Depression and Bipolar Support Alliance'>Depression and Bipolar Support Alliance</option>
 <option value='Diabetes National Research Group'>Diabetes National Research Group</option>
 <option value='Diabetes Research and Wellness Foundation'>Diabetes Research and Wellness Foundation</option>
 <option value='Diabetes Research Institute Foundation, Inc.'>Diabetes Research Institute Foundation, Inc.</option>
 <option value='Disabled and Alone/Life Services for the Handicapped'>Disabled and Alone/Life Services for the Handicapped</option>
 <option value='Doctors Without Borders'>Doctors Without Borders</option>
 <option value='Donors Choose'>Donors Choose</option>
 <option value='Double H Ranch, New York'>Double H Ranch, New York</option>
 <option value='Dress for Success Worldwide'>Dress for Success Worldwide</option>
 <option value='Dystrophic Epidermolysis Bullosa Research Association of America'>Dystrophic Epidermolysis Bullosa Research Association of America</option>
 <option value='Earth Day New York'>Earth Day New York</option>
 <option value='Earthjustice'>Earthjustice</option>
 <option value='EarthShare New York'>EarthShare New York</option>
 <option value='East End Hospice, New York'>East End Hospice, New York</option>
 <option value='Easter Seals'>Easter Seals</option>
 <option value='Easter Seals, New York, NYC'>Easter Seals, New York, NYC</option>
 <option value='ECHO'>ECHO</option>
 <option value='Endometriosis Association'>Endometriosis Association</option>
 <option value='EngenderHealth'>EngenderHealth</option>
 <option value='Environment America Research and Policy Center'>Environment America Research and Policy Center</option>
 <option value='Environmental Advocates of New York'>Environmental Advocates of New York</option>
 <option value='Environmental and Energy Study Institute'>Environmental and Energy Study Institute</option>
 <option value='Environmental Defense Fund'>Environmental Defense Fund</option>
 <option value='Environmental Law Institute'>Environmental Law Institute</option>
 <option value='Epilepsy Foundation of America'>Epilepsy Foundation of America</option>
 <option value='Epilepsy Society of Southern New York'>Epilepsy Society of Southern New York</option>
 <option value='Episcopal Relief & Development'>Episcopal Relief & Development</option>
 <option value='Family Research Council'>Family Research Council</option>
 <option value='Father Flanagans Boys Home'>Father Flanagans Boys Home</option>
 <option value='Feed My Starving Children'>Feed My Starving Children</option>
 <option value='Feed The Children'>Feed The Children</option>
 <option value='Feeding America'>Feeding America</option>
 <option value='Fellowship of Christian Athletes'>Fellowship of Christian Athletes</option>
 <option value='FINCA International'>FINCA International</option>
 <option value='Finger Lakes Land Trust'>Finger Lakes Land Trust</option>
 <option value='Focus on the Family'>Focus on the Family</option>
 <option value='Food for the Hungry'>Food for the Hungry</option>
 <option value='Foster Care To Success Foundation'>Foster Care To Success Foundation</option>
 <option value='Foundation Fighting Blindness'>Foundation Fighting Blindness</option>
 <option value='Foundation of the American Thoracic Society'>Foundation of the American Thoracic Society</option>
 <option value='Freedom From Hunger'>Freedom From Hunger</option>
 <option value='Friends of Oswego County Hospice, Inc., New York'>Friends of Oswego County Hospice, Inc., New York</option>
 <option value='Friends of the Earth'>Friends of the Earth</option>
 <option value='Gateway for Cancer Research'>Gateway for Cancer Research</option>
 <option value='Gay, Lesbian, Bisexual & Transgender Scholarship Fund - Point Foundation'>Gay, Lesbian, Bisexual & Transgender Scholarship Fund - Point Foundation</option>
 <option value='Give Kids The World'>Give Kids The World</option>
 <option value='GiveDirectly'>GiveDirectly</option>
 <option value='Glaucoma Research Foundation'>Glaucoma Research Foundation</option>
 <option value='Global Impact'>Global Impact</option>
 <option value='Good Shepherd Hospice, New York'>Good Shepherd Hospice, New York</option>
 <option value='Goodwill Industries International, Inc.'>Goodwill Industries International, Inc.</option>
 <option value='Group for the East End'>Group for the East End</option>
 <option value='Guide Dog Foundation for the Blind, Inc.'>Guide Dog Foundation for the Blind, Inc.</option>
 <option value='Harlem Hospital Sickle Cell Center, New York'>Harlem Hospital Sickle Cell Center, New York</option>
 <option value='Health Volunteers Overseas'>Health Volunteers Overseas</option>
 <option value='Heifer International'>Heifer International</option>
 <option value='Helen Keller International'>Helen Keller International</option>
 <option value='High Peaks Hospice and Palliative Care, New York, Queensbury'>High Peaks Hospice and Palliative Care, New York, Queensbury</option>
 <option value='Home School Foundation'>Home School Foundation</option>
 <option value='Hope Heart Institute'>Hope Heart Institute</option>
 <option value='Hospicare & Palliative Care Services, New York'>Hospicare & Palliative Care Services, New York</option>
 <option value='Hospice America (American Hospice Foundation)'>Hospice America (American Hospice Foundation)</option>
 <option value='Hospice and Palliative Care Association of NYS'>Hospice and Palliative Care Association of NYS</option>
 <option value='Hospice and Palliative Care of Westchester, New York'>Hospice and Palliative Care of Westchester, New York</option>
 <option value='Hospice Care Network, New York'>Hospice Care Network, New York</option>
 <option value='Hospice Inc., New York'>Hospice Inc., New York</option>
 <option value='Hospice of Central New York'>Hospice of Central New York</option>
 <option value='Human Rights Campaign Foundation'>Human Rights Campaign Foundation</option>
 <option value='Humane Ohio'>Humane Ohio</option>
 <option value='Huntingtons Disease Society of America'>Huntingtons Disease Society of America</option>
 <option value='I Have A Dream Foundation'>I Have A Dream Foundation</option>
 <option value='International Christian Concern'>International Christian Concern</option>
 <option value='International Executive Service Corps'>International Executive Service Corps</option>
 <option value='International Eye Foundation'>International Eye Foundation</option>
 <option value='International Medical Corps'>International Medical Corps</option>
 <option value='International Orthodox Christian Charities'>International Orthodox Christian Charities</option>
 <option value='International Planned Parenthood Federation, Western Hemisphere Region'>International Planned Parenthood Federation, Western Hemisphere Region</option>
 <option value='International Relief Teams'>International Relief Teams</option>
 <option value='International Rescue Committee'>International Rescue Committee</option>
 <option value='International Youth Foundation'>International Youth Foundation</option>
 <option value='Interstitial Cystitis Association'>Interstitial Cystitis Association</option>
 <option value='Izaak Walton League of America'>Izaak Walton League of America</option>
 <option value='JAARS'>JAARS</option>
 <option value='John Wayne Cancer Institute'>John Wayne Cancer Institute</option>
 <option value='Junior Achievement USA'>Junior Achievement USA</option>
 <option value='Juvenile Diabetes Research Foundation International'>Juvenile Diabetes Research Foundation International</option>
 <option value='Khan Academy'>Khan Academy</option>
 <option value='Kids for the Kingdom'>Kids for the Kingdom</option>
 <option value='Lance Armstrong Foundation'>Lance Armstrong Foundation</option>
 <option value='Land Trust Alliance'>Land Trust Alliance</option>
 <option value='Latino Youth Education Fund'>Latino Youth Education Fund</option>
 <option value='LatinoJustice PRLDEF'>LatinoJustice PRLDEF</option>
 <option value='Lets Cure CP'>Lets Cure CP</option>
 <option value='Leukemia & Lymphoma Society'>Leukemia & Lymphoma Society</option>
 <option value='Leukemia Research Foundation'>Leukemia Research Foundation</option>
 <option value='Lions Clubs International Foundation'>Lions Clubs International Foundation</option>
 <option value='LUNGevity Foundation'>LUNGevity Foundation</option>
 <option value='Lupus Alliance of America, New York, Hudson Valley N Y Affiliate'>Lupus Alliance of America, New York, Hudson Valley N Y Affiliate</option>
 <option value='Lupus Alliance of America, New York, Long Island/Queens Affiliate'>Lupus Alliance of America, New York, Long Island/Queens Affiliate</option>
 <option value='Lupus Alliance of America, New York, Southern Tier Affiliate'>Lupus Alliance of America, New York, Southern Tier Affiliate</option>
 <option value='Lupus Foundation of America'>Lupus Foundation of America</option>
 <option value='Lupus Foundation of Genesee Valley NY, Inc.'>Lupus Foundation of Genesee Valley NY, Inc.</option>
 <option value='Lupus Foundation of Mid & Northern New York'>Lupus Foundation of Mid & Northern New York</option>
 <option value='Lupus Research Institute, New York'>Lupus Research Institute, New York</option>
 <option value='Lutheran World Relief'>Lutheran World Relief</option>
 <option value='Lymphatic Research Foundation, Inc., New York'>Lymphatic Research Foundation, Inc., New York</option>
 <option value='Make-A-Wish Foundation® of America'>Make-A-Wish Foundation® of America</option>
 <option value='March of Dimes Foundation'>March of Dimes Foundation</option>
 <option value='MAZON: A Jewish Response to Hunger'>MAZON: A Jewish Response to Hunger</option>
 <option value='Meals On Wheels Association of America'>Meals On Wheels Association of America</option>
 <option value='Melanoma Research Foundation'>Melanoma Research Foundation</option>
 <option value='Memorial Sloan-Kettering Cancer Center, New York'>Memorial Sloan-Kettering Cancer Center, New York</option>
 <option value='Mental Health America (formerly National Mental Health Association)'>Mental Health America (formerly National Mental Health Association)</option>
 <option value='Mental Health America of New York, New York State'>Mental Health America of New York, New York State</option>
 <option value='Mercy Corps'>Mercy Corps</option>
 <option value='Mercy Ships'>Mercy Ships</option>
 <option value='Metropolitan Jewish Health System, New York'>Metropolitan Jewish Health System, New York</option>
 <option value='Mexican Medical'>Mexican Medical</option>
 <option value='Millennium Promise'>Millennium Promise</option>
 <option value='Mission Aviation Fellowship'>Mission Aviation Fellowship</option>
 <option value='Mission to Children'>Mission to Children</option>
 <option value='Mission: Readiness'>Mission: Readiness</option>
 <option value='Missionary Athletes International'>Missionary Athletes International</option>
 <option value='Moody Bible Institute'>Moody Bible Institute</option>
 <option value='MOPS International'>MOPS International</option>
 <option value='Mothers Against Drunk Driving'>Mothers Against Drunk Driving</option>
 <option value='Multiple Sclerosis Association of America'>Multiple Sclerosis Association of America</option>
 <option value='Multiple Sclerosis National Research Institute'>Multiple Sclerosis National Research Institute</option>
 <option value='Muscular Dystrophy Association'>Muscular Dystrophy Association</option>
 <option value='Myasthenia Gravis Foundation of America'>Myasthenia Gravis Foundation of America</option>
 <option value='Myasthenia Gravis Foundation of America, New York, Upstate NY Chapter'>Myasthenia Gravis Foundation of America, New York, Upstate NY Chapter</option>
 <option value='Myasthenia Gravis Foundation of Greater New York'>Myasthenia Gravis Foundation of Greater New York</option>
 <option value='NAACP Legal Defense and Educational Fund'>NAACP Legal Defense and Educational Fund</option>
 <option value='NAACP Special Contribution Fund'>NAACP Special Contribution Fund</option>
 <option value='NAMI (National Alliance on Mental Illness)'>NAMI (National Alliance on Mental Illness)</option>
 <option value='NARAL Pro-Choice America Foundation'>NARAL Pro-Choice America Foundation</option>
 <option value='National Association of the Deaf'>National Association of the Deaf</option>
 <option value='National Black Child Development Institute'>National Black Child Development Institute</option>
 <option value='National Brain Tumor Society'>National Brain Tumor Society</option>
 <option value='National Council on Alcoholism & Drug Dependence (NCADD)'>National Council on Alcoholism & Drug Dependence (NCADD)</option>
 <option value='National Day of Prayer Task Force'>National Day of Prayer Task Force</option>
 <option value='National Down Syndrome Society'>National Down Syndrome Society</option>
 <option value='National Eating Disorders Association'>National Eating Disorders Association</option>
 <option value='National Fish and Wildlife Foundation'>National Fish and Wildlife Foundation</option>
 <option value='National Headache Foundation'>National Headache Foundation</option>
 <option value='National Hemophilia Foundation'>National Hemophilia Foundation</option>
 <option value='National Hospice and Palliative Care Organization'>National Hospice and Palliative Care Organization</option>
 <option value='National Kidney Foundation'>National Kidney Foundation</option>
 <option value='National Kidney Foundation of Central New York, Inc.'>National Kidney Foundation of Central New York, Inc.</option>
 <option value='National Kidney Foundation of New York, Serving Greater New York'>National Kidney Foundation of New York, Serving Greater New York</option>
 <option value='National Kidney Foundation of New York, Western New York'>National Kidney Foundation of New York, Western New York</option>
 <option value='National Law Enforcement Officers Memorial Fund'>National Law Enforcement Officers Memorial Fund</option>
 <option value='National Marfan Foundation'>National Marfan Foundation</option>
 <option value='National Multiple Sclerosis Society'>National Multiple Sclerosis Society</option>
 <option value='National Multiple Sclerosis Society, New York, New York City/Southern New York Chapter'>National Multiple Sclerosis Society, New York, New York City/Southern New York Chapter</option>
 <option value='National Multiple Sclerosis Society, New York, New York City/Southern NY Chapter'>National Multiple Sclerosis Society, New York, New York City/Southern NY Chapter</option>
 <option value='National Multiple Sclerosis Society, New York, Upstate NY Chapter, Albany'>National Multiple Sclerosis Society, New York, Upstate NY Chapter, Albany</option>
 <option value='National Multiple Sclerosis Society, New York, Western New York Chapter'>National Multiple Sclerosis Society, New York, Western New York Chapter</option>
 <option value='National Organization for Rare Disorders (NORD)'>National Organization for Rare Disorders (NORD)</option>
 <option value='National Parkinson Foundation'>National Parkinson Foundation</option>
 <option value='National Parks Conservation Association'>National Parks Conservation Association</option>
 <option value='National Psoriasis Foundation'>National Psoriasis Foundation</option>
 <option value='National Right to Life Educational Trust Fund'>National Right to Life Educational Trust Fund</option>
 <option value='National Spinal Cord Injury Association'>National Spinal Cord Injury Association</option>
 <option value='National Spinal Cord Injury Association, Greater N Y Chapter'>National Spinal Cord Injury Association, Greater N Y Chapter</option>
 <option value='National Stroke Association'>National Stroke Association</option>
 <option value='National Trust for Historic Preservation in the United States'>National Trust for Historic Preservation in the United States</option>
 <option value='National Wildlife Federation'>National Wildlife Federation</option>
 <option value='Native American Rights Fund'>Native American Rights Fund</option>
 <option value='Natural Resources Defense Council of New York'>Natural Resources Defense Council of New York</option>
 <option value='Navigators, The'>Navigators, The</option>
 <option value='Nazarene Compassionate Ministries, Inc.'>Nazarene Compassionate Ministries, Inc.</option>
 <option value='Near East Foundation'>Near East Foundation</option>
 <option value='NetHope'>NetHope</option>
 <option value='New York Botanical Garden'>New York Botanical Garden</option>
 <option value='New York League of Conservation Voters Education Fund'>New York League of Conservation Voters Education Fund</option>
 <option value='New York Needs You (NYNY)'>New York Needs You (NYNY)</option>
 <option value='New York Public Interest Research Group Fund'>New York Public Interest Research Group Fund</option>
 <option value='New York Restoration Project'>New York Restoration Project</option>
 <option value='New York-New Jersey Trail Conference'>New York-New Jersey Trail Conference</option>
 <option value='New Yorkers for Parks'>New Yorkers for Parks</option>
 <option value='Northeast Kidney Foundation'>Northeast Kidney Foundation</option>
 <option value='Nurse-Family Partnership'>Nurse-Family Partnership</option>
 <option value='Ocean Conservancy'>Ocean Conservancy</option>
 <option value='Oceana Inc.'>Oceana Inc.</option>
 <option value='Officers Christian Fellowship'>Officers Christian Fellowship</option>
 <option value='Open Space Institute'>Open Space Institute</option>
 <option value='Operation Blessing International Relief and Development Corp.'>Operation Blessing International Relief and Development Corp.</option>
 <option value='Operation Smile'>Operation Smile</option>
 <option value='Opportunity International'>Opportunity International</option>
 <option value='Osteogenesis Imperfecta Foundation'>Osteogenesis Imperfecta Foundation</option>
 <option value='Ovarian Cancer Research Fund'>Ovarian Cancer Research Fund</option>
 <option value='Oxfam America'>Oxfam America</option>
 <option value='Pan American Development Foundation'>Pan American Development Foundation</option>
 <option value='Pancreatic Cancer Action Network'>Pancreatic Cancer Action Network</option>
 <option value='Parkinsons Disease Foundation'>Parkinsons Disease Foundation</option>
 <option value='Parks & Trails New York'>Parks & Trails New York</option>
 <option value='Partners In Health'>Partners In Health</option>
 <option value='PATH'>PATH</option>
 <option value='PCI-Media Impact'>PCI-Media Impact</option>
 <option value='Pencils of Promise'>Pencils of Promise</option>
 <option value='Pesticide Action Network North America'>Pesticide Action Network North America</option>
 <option value='PetSmart Charities, Inc.'>PetSmart Charities, Inc.</option>
 <option value='Plan USA'>Plan USA</option>
 <option value='Planned Parenthood Federation of America- International'>Planned Parenthood Federation of America- International</option>
 <option value='Prevent Blindness America (National Society to Prevent Blindness)'>Prevent Blindness America (National Society to Prevent Blindness)</option>
 <option value='Prevent Blindness America, New York, Tri-State'>Prevent Blindness America, New York, Tri-State</option>
 <option value='Prevent Child Abuse America'>Prevent Child Abuse America</option>
 <option value='Prison Fellowship'>Prison Fellowship</option>
 <option value='Prison Fellowship International'>Prison Fellowship International</option>
 <option value='Project HOPE'>Project HOPE</option>
 <option value='Project Sunshine'>Project Sunshine</option>
 <option value='Prostate Cancer Foundation'>Prostate Cancer Foundation</option>
 <option value='Protect the Adirondacks!'>Protect the Adirondacks!</option>
 <option value='Queens Centers for Progress, New York'>Queens Centers for Progress, New York</option>
 <option value='Rails-to-Trails Conservancy'>Rails-to-Trails Conservancy</option>
 <option value='Rainforest Alliance'>Rainforest Alliance</option>
 <option value='Reading Is Fundamental, Inc. (RIF)'>Reading Is Fundamental, Inc. (RIF)</option>
 <option value='Research to Prevent Blindness'>Research to Prevent Blindness</option>
 <option value='Riverkeeper'>Riverkeeper</option>
 <option value='Rockland Council on Alcoholism - New York'>Rockland Council on Alcoholism - New York</option>
 <option value='Rocky Mountain Institute'>Rocky Mountain Institute</option>
 <option value='Ronald McDonald House Charities'>Ronald McDonald House Charities</option>
 <option value='Rotary Foundation of Rotary International'>Rotary Foundation of Rotary International</option>
 <option value='S.L.E. Lupus Foundation, Inc. - New York'>S.L.E. Lupus Foundation, Inc. - New York</option>
 <option value='Salvation Army World Service Office (SAWSO)'>Salvation Army World Service Office (SAWSO)</option>
 <option value='Samaritans Purse'>Samaritans Purse</option>
 <option value='Save the Children'>Save the Children</option>
 <option value='Scenic America'>Scenic America</option>
 <option value='Senior Care Fund'>Senior Care Fund</option>
 <option value='SeriousFun (fka Association of Hole in the Wall Camps)'>SeriousFun (fka Association of Hole in the Wall Camps)</option>
 <option value='Share Our Strength'>Share Our Strength</option>
 <option value='Shepherds Call Inc, The'>Shepherds Call Inc, The</option>
 <option value='Sickle Cell Disease Association of America'>Sickle Cell Disease Association of America</option>
 <option value='SIDS Alliance Long Island Affiliate - New York'>SIDS Alliance Long Island Affiliate - New York</option>
 <option value='SIDS Alliance/First Candle'>SIDS Alliance/First Candle</option>
 <option value='Society of St. Andrew, The'>Society of St. Andrew, The</option>
 <option value='SOS Childrens Villages- USA'>SOS Childrens Villages- USA</option>
 <option value='Southern Poverty Law Center'>Southern Poverty Law Center</option>
 <option value='Spina Bifida Association of America'>Spina Bifida Association of America</option>
 <option value='Spina Bifida Association of New York'>Spina Bifida Association of New York</option>
 <option value='Spina Bifida Resource Network, New York'>Spina Bifida Resource Network, New York</option>
 <option value='St. Jude Childrens Research Hospital'>St. Jude Childrens Research Hospital</option>
 <option value='STANDUP FOR KIDS'>STANDUP FOR KIDS</option>
 <option value='Starlight Childrens Foundation'>Starlight Childrens Foundation</option>
 <option value='Surfrider Foundation'>Surfrider Foundation</option>
 <option value='Susan G. Komen for the Cure'>Susan G. Komen for the Cure</option>
 <option value='Teach For America'>Teach For America</option>
 <option value='TechnoServe'>TechnoServe</option>

                </select>
                <span class="select-icon" data-icon="&#xe002;"></span>
                <label for="agreement">
                  
                    By clicking submit I understand that this information will appear on screens and websites viewable by my coworkers.
                </label>
                <input type="submit">
            </form>
            <section class="social-media">
                <h2>Tell the world who you gave to.</h2>
                <a href="#" 
  onclick="
    var url='http://raisedby.us/impact/thrillist';
    window.open(
      'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(url), 
      'facebook-share-dialog', 
      'width=626,height=436'); 
    return false;" class="social-media__facebook"><span data-icon="&#xe003;"></span>Share on Facebook</a>
                <a href="https://twitter.com/share?url=http%3A%2F%2Fraisedby.us%2Fimpact%2Fthrillist" class="social-media__twitter"><span data-icon="&#xe004;"></span>Tweet</a>
            </section>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="../js/vendor/jquery.icheck.min.js"></script>
        <script src="../js/main.js"></script>
    </body>
</html>
		
END;


	}
}
else{
	print "Error";
	

}



?>