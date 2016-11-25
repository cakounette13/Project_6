Feature: Super User
  In order to manage the last observations and add new observations
  As a Super User
  I need to login as Super User
  then need to be able to validate or delete the last observations
  Or i can do modifications on my profile

  Background:
    Given I am on the homepage
    And I click on "#logoNavbar"
    And I fill in "_username" with "bob"
    And I fill in "_password" with "qwerty"
    And I press "Connexion"
    Then I should be on the homepage

  Scenario: Delete last observations
    And I follow "Contribution"
    And I should be on "/contribution"
    And I should see "quentin"
    Then I click on "a[href='/dernieres_observations/supprimer?id=51']"
    And I should see "oiseau supprimé"

  Scenario: Validate last observations
    And I follow "Contribution"
    And I should be on "/contribution"
    Then I click on "a[href='/contribution/valider?id=48']"
    And I should see "oiseau ajouté"

  @javascript
  Scenario: Add a new observation
    When I click on ".navbar-toggle"
    Then I click on ".fa-eye"
    And I should be on "/observation"
    When I select "Carduelis serinus" from "birds[nom]"
    And I fill in "birds[datevue]" with "23/11/2016"
    And I attach the file "/var/www/html/Project_6/web/images/bird_1.jpeg" to "birds[image]"
    And I press "Envoyer"
    Then I should see "Votre observation est valide et visible des maintenant"

  Scenario: Change my username
    And I follow "Profil"
    Then I should be on "/profil/"
    Then I follow "Edition du profil"
    Then I should be on "/profil/editer"
    And I fill in "fos_user_profile_form[username]" with "bobMarley"
    And I fill in "fos_user_profile_form[email]" with "bob.marley@gmail.com"
    And I fill in "fos_user_profile_form[current_password]" with "qwerty"
    And I press "Mettre à jour"
    Then I should be on "/profil/"
    And I should see "Le profil a été mis à jour"