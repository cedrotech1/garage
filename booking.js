import {
    createBooking,
    updateBooking,
    getBookings,
    getOneBookingWithDetails,
    approvebookings,
    rejectingbookings,
    getBookingsByClassRoom,
    cancelBooking,
    getRejectedBookings,
    getApprovedBookings,
    getPendingBookings,
  } from "../services/bookingService";
  import Email from "../utils/mailer";
  import { checkprivileges } from "../helpers/privileges";
  import { getUserByPrivilege } from "../services/userService";
  import {
    generateApprovalToken,
    checkApprovalToken,
  } from "../helpers/approvalToken";
  
  export const BookingWithAll = async (req, res) => {
    try {
      const userid=req.user.id;
      console.log(userid);
  
      let data = await getBookings();
      if (!data) {
        data = [];
        return res.status(404).json({
          message: "Booking not found",
          data,
        });
      }
  
     
       data= data.filter(data => data.User.id===userid)
  
  
  
      return res.status(200).json({
        success: true,
        message: "Booking retrieved successfully",
        data,
      });
    } catch (error) {
      console.log(error);
      return res.status(500).json({
        message: "Something went wrong",
        error,
      });
    }
  };
  
  export const Bookingrejected = async (req, res) => {
    try {
  
  
      let data = await getRejectedBookings();
      const campusid=req.user.campus;
      if (!data) {
        data = [];
        return res.status(404).json({
          message: "Rejected Booking not found",
          data,
        });
      }
  
    
       data= data.filter(data => data.ClassRoom.campus_id===campusid)
  
      
      return res.status(200).json({
        success: true,
        message: "Booking retrieved successfully",
        data,
      });
    } catch (error) {
      console.log(error);
      return res.status(500).json({
        message: "Something went wrong",
        error,
      });
    }
  };
  export const Bookingapproved = async (req, res) => {
    try {
      let data = await getApprovedBookings();
      const campusid=req.user.campus;
      console.log(campusid);
      if (!data) {
        data = [];
        return res.status(404).json({
          message: "Approved Booking not found",
          data,
        });
      }
  
    
       data= data.filter(data => data.ClassRoom.campus_id===campusid)
  // console.log(data.ClassRoom.campus_id);
  data.forEach(booking => {
    console.log(booking.ClassRoom.campus_id);
  });
  
      return res.status(200).json({
        success: true,
        message: "Approved Booking retrieved successfully",
        data,
      });
    } catch (error) {
      console.log(error);
      return res.status(500).json({
        message: "Something went wrong",
        error,
      });
    }
  };
  export const Bookingpending = async (req, res) => {
    try {
     
      let data = await getPendingBookings();
      const campusid=req.user.campus;
      if (!data) {
        data = [];
        return res.status(404).json({
          message: "Pending Booking not found",
          data,
        });
      }
  
    
       data= data.filter(data => data.ClassRoom.campus_id===campusid)
  
      return res.status(200).json({
        success: true,
        message: "pending Booking retrieved successfully",
        data,
      });
    } catch (error) {
      console.log(error);
      return res.status(500).json({
        message: "Something went wrong",
        error,
      });
    }
  };
  export const getClassRoomBookings = async (req, res) => {
    try {
      let data = await getBookingsByClassRoom(req.params.id);
      const userid=req.user.id;
      console.log(userid);
  
      if (!data) {
        data = [];
        return res.status(404).json({
          message: "Booking not found",
          data,
        });
      }
  
     
       data= data.filter(data => data.User.id===userid)
  
  
      return res.status(200).json({
        success: true,
        message: "Booking retrieved successfully",
        data,
      });
    } catch (error) {
      console.log(error);
      return res.status(500).json({
        message: "Something went wrong",
        error,
      });
    }
  };
  
  export const addBooking = async (req, res) => {
    try {
      if (!checkprivileges(req.user.privileges, "manage-classroom-booking")) {
        return res.status(401).json({
          success: false,
          message: "Not authorized",
        });
      }
  
      req.body.userid = req.user.id;
  
      const newBooking = await createBooking(req.body);
      const classRoomInfo = await getOneBookingWithDetails(newBooking.id);
      const approval = await getUserByPrivilege(
        "manage-classroom-approval",
        req.user.campus
      );
  
  
      // generate approval token
      const approvalToken = await generateApprovalToken(newBooking);
  
      classRoomInfo.approvalToken = approvalToken;
  
      await new Email(req.user, null, {
        ...classRoomInfo,
      }).sendClassRoomBookingConfirmation();
  
      if (approval && approval.length > 0) {
        approval.forEach(async (user) => {
          await new Email(user, null, {
            classRoomInfo,
          }).sendClassRoomBookingRequest();
        });
      }
  
      return res.status(201).json({
        success: true,
        message: "Booking created successfully",
        Booking: newBooking,
      });
    } catch (error) {
      console.error("Error adding Booking:", error);
      return res.status(500).json({
        message: "Something went wrong",
        error: error.message,
      });
    }
  };
  
  
  
  export const cancelOneBooking = async (req, res) => {
    try {
      if (!checkprivileges(req.user.privileges, "manage-classroom-booking")) {
        return res.status(401).json({
          success: false,
          message: "Not authorized",
        });
      }
  
      const classRoomInfo = await getOneBookingWithDetails(req.params.id);
      const Booking = await cancelBooking(req.params.id);
      if (!Booking) {
        return res.status(404).json({
          success: false,
          message: "Booking not found",
        });
      }
      const approval = await getUserByPrivilege(
        "manage-classroom-approval",
        req.user.campus
      );
      if (classRoomInfo.status === "approved") {
        return res.status(404).json({
          success: false,
          message: "Booking aready approved",
        });
      }
  
      if (classRoomInfo.status === "rejected") {
        return res.status(404).json({
          success: false,
          message: "Booking aready rejected",
        });
      }
  
      if (!Booking) {
        return res.status(404).json({
          success: false,
          message: "Booking not found",
        });
      }
  
      // send email
      await new Email(
        req.user,
        null,
        classRoomInfo
      ).sendClassRoomBookingCancered();
  
      if (approval && approval.length > 0) {
        approval.forEach(async (user) => {
          await new Email(
            user,
            null,
            classRoomInfo
          ).sendClassRoomBookingCancered();
        });
      }
  
      return res.status(200).json({
        success: true,
        message: "Booking canceled successfully",
        Booking,
      });
    } catch (error) {
      console.log(error);
      return res.status(500).json({
        message: "Something went wrong",
        error,
      });
    }
  };
  
  export const getOneBooking = async (req, res) => {
    try {
      const { id } = req.params;
      const campusid=req.user.campus;
      const userid=req.user.id;
      let data = await getOneBookingWithDetails(id);
    
      if (!data) {
        data = [];
        return res.status(404).json({
          message: "that  Booking not found",
          data,
        });
      }
      if (!Array.isArray(data)) {
        data = [data];
      }
  
      if (!checkprivileges(req.user.privileges, "manage-classroom-approval")) {
        data= data.filter(data => data.User.id===userid)
      }else{
        data= data.filter(data => data.ClassRoom.campus_id===campusid)
      }
  
      return res.status(200).json({
        success: true,
        message: "Booking retrieved successfully",
        data,
      });
    } catch (error) {
      console.log(error)
      return res.status(500).json({
        message: "Something went wrong",
        error,
      });
    }
  };
  
  export const updateOneBooking = async (req, res) => {
    try {
      if (!checkprivileges(req.user.privileges, "manage-classroom-booking")) {
        return res.status(401).json({
          success: false,
          message: "Not authorized",
        });
      }
  
      req.body.userid = req.user.id;
      const updatedBooking = await updateBooking(req.params.id, req.body);
  
      if (!updatedBooking) {
        return res.status(404).json({
          success: false,
          message: "Booking not found",
        });
      }
  
      return res.status(200).json({
        success: true,
        message: "Booking updated successfully",
        booking: updatedBooking,
      });
    } catch (error) {
      return res.status(500).json({
        message: "Something went wrong",
        error,
      });
    }
  };
  
  export const approveBooking = async (req, res) => {
    try {
      if (!checkprivileges(req.user.privileges, "manage-classroom-approval")) {
        return res.status(401).json({
          success: false,
          message: "Not authorized",
        });
      }
      const existingBooking = await getOneBookingWithDetails(req.params.id);
      if (!existingBooking) {
        return res.status(404).json({
          success: false,
          message: "Booking not found",
        });
      }
      const booking = await approvebookings(req.params.id);
      if (!booking) {
        return res.status(404).json({
          success: false,
          message: "booking not found",
        });
      }
  
      const start = new Date(existingBooking.startPeriod).toLocaleString();
      const end = new Date(existingBooking.endPeriod).toLocaleString();
  
      await new Email(
        existingBooking.User,
        null,
        existingBooking,
      ).sendClassRoomBookingApproval();
  
      return res.status(200).json({
        success: true,
        message: "booking approved successfully",
      });
    } catch (error) {
      console.log(error);
      return res.status(500).json({
        message: "Something went wrong",
        error,
      });
    }
  };
  
  export const rejectBooking = async (req, res) => {
    try {
      if (!checkprivileges(req.user.privileges, "manage-classroom-approval")) {
        return res.status(401).json({
          success: false,
          message: "Not authorized",
        });
      }
  
      const existingBooking = await getOneBookingWithDetails(req.params.id);
      if (!existingBooking) {
        return res.status(404).json({
          success: false,
          message: "Booking not found",
        });
      }
      const booking = await rejectingbookings(req.params.id);
      if (!booking) {
        return res.status(404).json({
          success: false,
          message: "booking not found",
        });
      }
      const reason = req.body.reason_to_reject;
      await new Email(
        existingBooking.User,
        null,
        existingBooking,
        reason
      ).sendClassRoomBookingRejection();
      return res.status(200).json({
        success: true,
        message: "booking rejected successfully",
      });
    } catch (error) {
      console.log(error);
      return res.status(500).json({
        message: "Something went wrong",
        error,
      });
    }
  };
  
  export const approveBookingViaEmail = async (req, res) => {
    try {
      const approvalToken = req.params.token;
      const bookingData = await checkApprovalToken(approvalToken);
      if (!bookingData) {
        return res.status(404).json({
          success: false,
          message: "Invalid token or token expired",
        });
      }
      console.log("bookingData:", bookingData);
      const existingBooking = await getOneBookingWithDetails(bookingData.id);
      if (!existingBooking) {
        return res.status(404).json({
          success: false,
          message: "Booking not found",
        });
      }
      if (existingBooking.status === "approved") {
        return res.status(404).json({
          success: false,
          message: "Booking aready approved",
        });
      }
      if (existingBooking.status === "rejected") {
        return res.status(400).json({
          success: false,
          message: "Booking aready rejected",
        });
      }
      const booking = await approvebookings(bookingData.id);
      if (!booking) {
        return res.status(400).json({
          success: false,
          message: "booking not found",
        });
      }
      await new Email(
        existingBooking.User,
        null,
        existingBooking
      ).sendClassRoomBookingApproval();
  
      return res.status(200).json({
        success: true,
        message: "booking approved successfully",
      });
    } catch (error) {
      console.log(error);
      return res.status(500).json({
        message: "Something went wrong",
        error,
      });
    }
  };
  
  export const rejectBookingViaEmail = async (req, res) => {
    try {
      const approvalToken = req.params.token;
      const bookingData = await checkApprovalToken(approvalToken);
      const existingBooking = await getOneBookingWithDetails(bookingData.id);
      if (!existingBooking) {
        return res.status(404).json({
          success: false,
          message: "Booking not found",
        });
      }
      if (existingBooking.status === "approved") {
        return res.status(400).json({
          success: false,
          message: "Booking aready approved",
        });
      }
      if (existingBooking.status === "rejected") {
        return res.status(400).json({
          success: false,
          message: "Booking aready rejected",
        });
      }
      const booking = await rejectingbookings(bookingData.id);
      if (!booking) {
        return res.status(404).json({
          success: false,
          message: "booking not found",
        });
      }
      const reason = req.body.reason_to_reject;
      await new Email(
        existingBooking.User,
        null,
        existingBooking,
        reason
      ).sendClassRoomBookingRejection();
      return res.status(200).json({
        success: true,
        message: "booking rejected successfully",
      });
    } catch (error) {
      console.log(error);
      return res.status(500).json({
        message: "Something went wrong",
        error,
      });
    }
  };
  























  "use strict";
import bcrypt from "bcrypt";

module.exports = {
  up: async (queryInterface, Sequelize) => {
    const saltRounds = 10; // Number of salt rounds for bcrypt

    // Hashed passwords for different users
    const hashedPasswordAdmin = await bcrypt.hash("1234", saltRounds);
    const hashedPasswordUser = await bcrypt.hash("1234", saltRounds);


    return queryInterface.bulkInsert("Users", [
      {
        firstname: "Root",
        lastname: "User",
        email: "root@example.com",
        phone: "1234567890",
        role: "root",
        status: "active",
        password: hashedPasswordAdmin,
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        firstname: "systemcampusadmin",
        lastname: "User",
        email: "systemcampusadmin@example.com",
        phone: "9876543210",
        role: "systemcampusadmin",
        campus: 1,
        status: "active",
        password: hashedPasswordUser,
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        firstname: "cedro",
        lastname: "cedrick",
        email: "cedrickhakuzimana@gmail.com",
        phone: "07946464344",
        role: "user",
        status: "active",
        campus: 1,
        privileges:JSON.stringify(["manage-classroom-booking","manage-classrooms"]),
        password: hashedPasswordUser,
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        firstname: "tresor",
        lastname: "cedrick",
        email: "cedrickhakuzimana75@gmail.com",
        phone: "074546464",
        role: "user",
        campus: 1,
        status: "active",
        privileges:  JSON.stringify(["manage-classroom-approval"]),
        password: hashedPasswordUser,
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        firstname: "baba",
        lastname: "kababa",
        email: "baba@gmail.com",
        phone: "07964094344",
        role: "user",
        status: "active",
        campus: 1,
        privileges:JSON.stringify(["manage-classroom-booking","manage-classrooms"]),
        password: hashedPasswordUser,
        createdAt: new Date(),
        updatedAt: new Date(),
      },

    ]);
  },

  down: async (queryInterface, Sequelize) => {
    return queryInterface.bulkDelete("Users", null, {});
  },
};




import ejs from "ejs";
import path from "path";
import sgMail from "@sendgrid/mail";
import dotenv from "dotenv";
dotenv.config();
// Function to format date to string consistently
const formatDate = (date) => {
  return new Date(date).toLocaleString('en-US', { 
    timeZone: 'UTC',
    year: 'numeric', 
    month: '2-digit', 
    day: '2-digit',
    hour: '2-digit', 
    minute: '2-digit', 
    second: '2-digit' 
  });
};

class Email {
  constructor(user, url, booking, reason) {
    this.to = user.email;
    this.firstname = user.firstname;
    this.lastname = user.lastname;
    this.password = user.password;
    this.email = user.email;
    this.from = process.env.EMAIL_FROM;
    this.url = url;
    this.booking = booking;
    this.reason = reason;
  }

  // Send the actual email
  async send(template, subject, title) {
    sgMail.setApiKey(process.env.SENDGRID_API_KEY);

    // 1) Render HTML based on a ejs template
    const html = await ejs.renderFile(
      path.join(__dirname, `./../views/email/${template}.ejs`),
      {
        firstname: this.firstname,
        lastname: this.lastname,
        password: this.password,
        email: this.email,
        url: this.url,
        classRoom: this.booking ? this.booking.ClassRoom.name : null,
        location: this.booking ? this.booking.ClassRoom.location : null,
        startPeriod: this.booking ? formatDate(this.booking.startPeriod) : null,
        endPeriod: this.booking ? formatDate(this.booking.endPeriod) : null,
        requester_name: this.booking
          ? this.booking.User.firstname + " " + this.booking.User.lastname
          : null,
        requester_email: this.booking ? this.booking.User.email : null,
        approvalToken: this.booking ? this.booking.approvalToken : null,
        reason: this.reason,
      }
    );

    // 2) Define email options
    const mailOptions = {
      to: this.to, // Change to your recipient
      from: this.from, // Change to your verified sender
      subject,
      text: html,
      html,
    };
    // 3) Create a transport and send email
    sgMail
      .send(mailOptions)
      .then(() => {
        console.log("Email sent");
      })
      .catch((error) => {
        console.error(error);
      });
  }

  async sendAccountAdded() {
    await this.send("accountAdded", "Welcome to UR facilities allocation");
  }
  async sendClassRoomBookingConfirmation() {
    await this.send(
      "classRoomBookingConfirmation",
      "Classroom Booking Confirmation"
    );
  }

  //cancel email
  async sendClassRoomBookingCancered() {
    await this.send("classRoomBookingCanceled", "Classroom Booking Canceled");
  }
  async sendClassRoomBookingRequest() {
    await this.send("classRoomBookingRequest", "Classroom Booking Request");
  }
  async sendClassRoomBookingApproval() {
    await this.send("classRoomBookingApproval", "Classroom Booking Approval");
  }
  async sendClassRoomBookingRejection() {
    await this.send("classRoomBookingRejection", "Classroom Booking Rejection");
  }
}

export default Email;
