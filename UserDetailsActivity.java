package com.example.healthlocator;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;
import androidx.appcompat.app.AppCompatActivity;

public class UserDetailsActivity extends AppCompatActivity {

    private TextView userName, userEmail, userPhone, userAge, userGender, userType, userLocation;
    private Button btnLogout, btnCancel;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_userdetails);

        // Initialize UI elements
        userName = findViewById(R.id.user_name);
        userEmail = findViewById(R.id.user_email);
        userPhone = findViewById(R.id.user_phone);
        userAge = findViewById(R.id.user_age);
        userGender = findViewById(R.id.user_gender);
        userType = findViewById(R.id.user_type);
        userLocation = findViewById(R.id.user_location);
        btnLogout = findViewById(R.id.logout_message);
        btnCancel = findViewById(R.id.btn_cancel);

        // Retrieve user details from SharedPreferences
        SharedPreferences sharedPreferences = getSharedPreferences("UserPrefs", MODE_PRIVATE);
        String name = sharedPreferences.getString("USER_NAME", "");
        String email = sharedPreferences.getString("USER_EMAIL", "");
        String phone = sharedPreferences.getString("USER_PHONE", "");
        String age = sharedPreferences.getString("USER_AGE", "");
        String gender = sharedPreferences.getString("USER_GENDER", "");
        String userTypeText = sharedPreferences.getString("USER_TYPE", "");
        String location = sharedPreferences.getString("USER_LOCATION", "");

        // Display user details
        userName.setText(name);
        userEmail.setText(email);
        userPhone.setText(phone);
        userAge.setText(age);
        userGender.setText(gender);
        userType.setText(userTypeText);
        userLocation.setText(location);

        // Logout Button - Clears Data and Redirects to Login
        btnLogout.setOnClickListener(v -> {
            SharedPreferences.Editor editor = sharedPreferences.edit();
            editor.clear();
            editor.apply();

            Toast.makeText(UserDetailsActivity.this, "Logging out...", Toast.LENGTH_SHORT).show();

            Intent loginIntent = new Intent(UserDetailsActivity.this, LoginActivity.class);
            startActivity(loginIntent);
            finish();
        });

        // Cancel Button - Return to Home
        btnCancel.setOnClickListener(v -> {
            Intent homeIntent = new Intent(UserDetailsActivity.this, HomeActivity.class);
            startActivity(homeIntent);
            finish();
        });
    }
}
