package com.example.healthlocator;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.widget.ArrayAdapter;
import android.widget.Spinner;
import android.widget.EditText;
import android.widget.RadioGroup;
import android.widget.Button;
import android.widget.Toast;
import androidx.appcompat.app.AppCompatActivity;

public class CheckInActivity extends AppCompatActivity {

    private EditText etName, etEmail, etPhone, etAge, etLocation;
    private RadioGroup radioGroupGender;
    private Spinner spinnerUserType;
    private Button btnSubmit, btnHome;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_checkin);

        // Initialize Views
        etName = findViewById(R.id.etName);
        etEmail = findViewById(R.id.etEmail);
        etPhone = findViewById(R.id.etPhone);
        etAge = findViewById(R.id.etAge);
        etLocation = findViewById(R.id.etLocation);
        radioGroupGender = findViewById(R.id.radioGroupGender);
        spinnerUserType = findViewById(R.id.spinnerUserType);
        btnSubmit = findViewById(R.id.submit);
        btnHome = findViewById(R.id.btnH);

        // Spinner Data
        String[] userTypes = {
                "Public",
                "People with Chronic Health Conditions",
                "Tourists and Travelers",
                "Healthcare Professionals and Caregivers"
        };

        ArrayAdapter<String> adapter = new ArrayAdapter<>(this, android.R.layout.simple_spinner_item, userTypes);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerUserType.setAdapter(adapter);

        // Set OnClickListener for Submit button
        btnSubmit.setOnClickListener(v -> {
            String name = etName.getText().toString().trim();
            String email = etEmail.getText().toString().trim();
            String phone = etPhone.getText().toString().trim();
            String age = etAge.getText().toString().trim();
            String location = etLocation.getText().toString().trim();
            String userType = spinnerUserType.getSelectedItem().toString();

            int selectedGenderId = radioGroupGender.getCheckedRadioButtonId();
            String gender = (selectedGenderId == R.id.radioMale) ? "Male" : "Female";

            if (name.isEmpty() || email.isEmpty() || phone.isEmpty() || age.isEmpty() || location.isEmpty()) {
                Toast.makeText(this, "Please fill in all fields", Toast.LENGTH_SHORT).show();
                return;
            }

            // Save user details in SharedPreferences
            SharedPreferences sharedPreferences = getSharedPreferences("UserPrefs", MODE_PRIVATE);
            SharedPreferences.Editor editor = sharedPreferences.edit();
            editor.putString("USER_NAME", name);
            editor.putString("USER_EMAIL", email);
            editor.putString("USER_PHONE", phone);
            editor.putString("USER_AGE", age);
            editor.putString("USER_GENDER", gender);
            editor.putString("USER_TYPE", userType);
            editor.putString("USER_LOCATION", location);
            editor.apply();

            // Navigate to UserDetailsActivity
            Intent intent = new Intent(CheckInActivity.this, UserDetailsActivity.class);
            startActivity(intent);
        });

        // Home Button
        btnHome.setOnClickListener(v -> {
            Intent homeIntent = new Intent(CheckInActivity.this, HomeActivity.class);
            startActivity(homeIntent);
            finish();
        });
    }
}
